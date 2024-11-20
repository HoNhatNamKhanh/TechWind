<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index(Request $request)
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }


        $user = auth()->user(); // Lấy người dùng hiện tại
        $cartItems = Cart::where('user_id', $user->id)->get(); // Lấy tất cả sản phẩm trong giỏ hàng của người dùng

        if ($cartItems->isEmpty()) {
            // Nếu giỏ hàng trống
            return view('cart', compact('cartItems'))->with('error', 'Giỏ hàng của bạn trống!');
        }

        // Tính toán subtotal, taxes và total
        $subtotal = $cartItems->sum(function ($item) {
            return $item->variant->price * $item->quantity;
        });
        $taxes = $subtotal * 0.1; // Giả sử thuế là 10%
        $total = $subtotal + $taxes;

        // Truyền tất cả các biến vào view
        return view('cart', compact('cartItems', 'subtotal', 'taxes', 'total'));
    }

    public function add(Request $request, $id)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.'
            ], 401); // Trả về JSON với mã lỗi 401
        }

        // Lấy thông tin người dùng
        $user = auth()->user();

        // Tìm sản phẩm và biến thể với findOrFail để tự động trả về lỗi 404 nếu không tìm thấy
        $product = Product::findOrFail($id); // Tìm sản phẩm, sẽ tự động trả về 404 nếu không tồn tại
        $variantId = $request->input('variant_id');
        $variant = $product->variants()->findOrFail($variantId); // Kiểm tra và lấy biến thể

        // Kiểm tra xem sản phẩm còn hàng không
        if ($variant->stock <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm này hiện tại đã hết hàng.'
            ], 400); // Trả về thông báo hết hàng với mã lỗi 400
        }

        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $product->id)
            ->where('variant_id', $variantId)
            ->first();

        // Nếu sản phẩm đã có trong giỏ hàng
        if ($cartItem) {
            // **Loại bỏ giới hạn số lượng** - không cần kiểm tra maxQuantity nữa
            $cartItem->quantity++;
            $cartItem->save();

            return response()->json([
                'success' => true,
                'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
                'cart_quantity' => $cartItem->quantity
            ]);
        }

        // Nếu sản phẩm chưa có trong giỏ, thêm sản phẩm mới vào giỏ hàng
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'variant_id' => $variantId,
            'quantity' => 1,
        ]);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }


    public function remove($id)
    {
        $user = auth()->user();
        $cartItem = Cart::where('user_id', $user->id)->where('id', $id)->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Sản phẩm không có trong giỏ hàng!'], 404);
        }

        // Xóa sản phẩm khỏi giỏ hàng
        $cartItem->delete();

        return response()->json(['message' => 'Sản phẩm đã được xóa khỏi giỏ hàng!']);
    }
<<<<<<< HEAD
=======

    // Phương thức tăng số lượng
    public function increase(Request $request, $id)
    {
        $user = auth()->user();

        // Tìm sản phẩm trong giỏ hàng của người dùng
        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        // Nếu không tìm thấy sản phẩm trong giỏ hàng, trả về lỗi
        if (!$cartItem) {
            \Log::error("Cart item not found for user {$user->id}, item ID: {$id}");
            return response()->json(['error' => true, 'message' => 'Sản phẩm không có trong giỏ hàng!'], 404);
        }

        // Tăng số lượng sản phẩm trong giỏ hàng
        $cartItem->quantity++;
        $cartItem->save();

        // Tính lại subtotal (tổng giá trị giỏ hàng trước thuế)
        $subtotal = Cart::where('user_id', $user->id)
            ->join('variants', 'carts.variant_id', '=', 'variants.id')
            ->sum(DB::raw('carts.quantity * variants.price'));

        // Giả sử thuế là 10%
        $taxes = $subtotal * 0.1;

        // Tính tổng giỏ hàng sau thuế
        $total = $subtotal + $taxes;

        // Tính lại giá của sản phẩm hiện tại (item price = unit price * quantity)
        $itemPrice = $cartItem->variant->price * $cartItem->quantity;

        \Log::info("Increase successful for item ID: {$id}. New subtotal: {$subtotal}, taxes: {$taxes}, total: {$total}");

        // Trả về thông tin giỏ hàng đã được cập nhật
        return response()->json([
            'error' => false,
            'quantity' => $cartItem->quantity,    // Số lượng mới
            'itemPrice' => $itemPrice,             // Giá sản phẩm sau khi thay đổi số lượng
            'subtotal' => $subtotal,              // Tổng giỏ hàng (trước thuế)
            'taxes' => $taxes,                     // Thuế
            'total' => $total,                     // Tổng sau thuế
        ], 200);
    }

    // Phương thức giảm số lượng
    public function decrease(Request $request, $id)
    {
        $user = auth()->user();

        // Tìm sản phẩm trong giỏ hàng của người dùng
        $cartItem = Cart::where('user_id', $user->id)
            ->where('id', $id)
            ->first();

        // Nếu không tìm thấy sản phẩm trong giỏ hàng, trả về lỗi
        if (!$cartItem) {
            \Log::error("Cart item not found for user {$user->id}, item ID: {$id}");
            return response()->json(['error' => true, 'message' => 'Sản phẩm không có trong giỏ hàng!'], 404);
        }

        // Giảm số lượng sản phẩm trong giỏ hàng
        $cartItem->quantity--;
        $cartItem->save();

        // Tính lại subtotal (tổng giá trị giỏ hàng trước thuế)
        $subtotal = Cart::where('user_id', $user->id)
            ->join('variants', 'carts.variant_id', '=', 'variants.id')
            ->sum(DB::raw('carts.quantity * variants.price'));

        // Giả sử thuế là 10%
        $taxes = $subtotal * 0.1;

        // Tính tổng giỏ hàng sau thuế
        $total = $subtotal + $taxes;

        // Tính lại giá của sản phẩm hiện tại (item price = unit price * quantity)
        $itemPrice = $cartItem->variant->price * $cartItem->quantity;

        \Log::info("Increase successful for item ID: {$id}. New subtotal: {$subtotal}, taxes: {$taxes}, total: {$total}");

        // Trả về thông tin giỏ hàng đã được cập nhật
        return response()->json([
            'error' => false,
            'quantity' => $cartItem->quantity,    // Số lượng mới
            'itemPrice' => $itemPrice,             // Giá sản phẩm sau khi thay đổi số lượng
            'subtotal' => $subtotal,              // Tổng giỏ hàng (trước thuế)
            'taxes' => $taxes,                     // Thuế
            'total' => $total,                     // Tổng sau thuế
        ], 200);
    }

>>>>>>> 81eeebc95ad79786098f226d0f62d1cac343bf89
}
