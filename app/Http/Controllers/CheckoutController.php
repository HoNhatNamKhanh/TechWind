<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;



use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Variant;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Log;

class CheckoutController extends Controller
{
    public function index()
    {
        // Lấy thông tin người dùng đã đăng nhập
        $user = auth()->user();

        // Lấy thông tin từ UserMeta nếu người dùng đã đăng nhập
        $userMeta = $user ? $user->userMeta : null;

        // Lấy giỏ hàng của người dùng
        $cartItems = Cart::where('user_id', $user ? $user->id : null)->get();

        // Kiểm tra giỏ hàng trống
        if ($cartItems->isEmpty()) {
            Log::info('Giỏ hàng trống', ['user_id' => $user ? $user->id : null]);
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn trống!');
        }

        // Tính toán tổng tiền và thuế
        $subtotal = $this->calculateSubtotal($cartItems);
        $taxes = $subtotal * 0.1; // Thuế 10%
        $total = $subtotal + $taxes;

        // Log thông tin thanh toán
        Log::info('Tính toán tổng tiền', [
            'user_id' => $user ? $user->id : null,
            'subtotal' => $subtotal,
            'taxes' => $taxes,
            'total' => $total
        ]);

        // Trả về view với dữ liệu cần thiết
        return view('checkout', compact('cartItems', 'subtotal', 'taxes', 'total', 'userMeta', 'user'));
    }

    public function create(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        $user = auth()->user();
    
        if (!$user) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:255',
                'payment_method' => 'required|string',
            ]);
    
            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $address = $request->input('address');
            $userId = null;
        } else {
            $userMeta = $user->userMeta;
            $name = $user->name;
            $email = $user->email;
            $phone = $userMeta->phone ?? $request->input('phone');
            $address = $userMeta->address ?? $request->input('address');
            $userId = $user->id;
        }
    
        $cartItemsFromRequest = $request->input('cart_items');
    
        if (!is_array($cartItemsFromRequest) || count($cartItemsFromRequest) === 0) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn trống!');
        }
    
        // Kiểm tra tồn kho các sản phẩm trong giỏ hàng
        foreach ($cartItemsFromRequest as $cartItemData) {
            $variant = Variant::findOrFail($cartItemData['variant_id']);
            $quantity = (int) $cartItemData['quantity'];
    
            if ($variant->stock < $quantity) {
                return redirect()->route('cart')->with('error', 'Không đủ hàng trong kho cho sản phẩm: ' . $variant->product->name . ' - ' . $variant->name);
            }
        }
    
        // Tính toán tổng tiền cho đơn hàng
        $totalAmount = $this->calculateSubtotalFromRequest($cartItemsFromRequest);
        $taxes = $totalAmount * 0.1; // Thuế 10%
        $total = $totalAmount + $taxes;
    
        // Tạo mã đơn hàng tự động
        $orderCode = 'ORD-' . strtoupper(Str::random(8));
    
        // Bắt đầu transaction
        DB::beginTransaction();
    
        try {
            $order = Order::create([
                'user_id' => $userId,
                'status' => 'pending',
                'code' => $orderCode,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'total' => $total,
            ]);
    
            foreach ($cartItemsFromRequest as $cartItemData) {
                $variant = Variant::findOrFail($cartItemData['variant_id']);
                $quantity = (int) $cartItemData['quantity'];
                $price = $variant->price * $quantity;
    
                $variant->decrement('stock', $quantity);
    
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $variant->product_id,
                    'variant_id' => $variant->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total_price' => $price,
                    'size' => $variant->size,
                    'color' => $variant->color,
                ]);
            }
    
            // Gửi email xác nhận đơn hàng
            Mail::to($email)->send(new OrderConfirmationMail($order));
    
            // Xóa giỏ hàng
            Cart::where('user_id', $userId)->delete();
    
            DB::commit();
    
            return redirect()->route('checkout.success', ['order' => $order->id])
                ->with('success', 'Đơn hàng của bạn đã được tạo thành công! Mã đơn hàng: ' . $orderCode);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('cart')->with('error', 'Đã có lỗi xảy ra khi tạo đơn hàng. Vui lòng thử lại!');
        }
    }
    



    // Phương thức tính tổng tiền cho giỏ hàng từ request
    private function calculateSubtotalFromRequest($cartItemsFromRequest)
    {
        $subtotal = 0;
        foreach ($cartItemsFromRequest as $cartItemData) {
            $variant = Variant::findOrFail($cartItemData['variant_id']);
            $subtotal += $variant->price * (int) $cartItemData['quantity'];
        }
        return $subtotal;
    }
    private function calculateSubtotal($cartItems)
    {
        return $cartItems->sum(function ($item) {
            // Ensure the variant exists before accessing the price
            if ($item->variant && $item->variant->price) {
                return $item->variant->price * $item->quantity;
            }
            // Return 0 if no valid variant is found
            return 0;
        });
    }
}
