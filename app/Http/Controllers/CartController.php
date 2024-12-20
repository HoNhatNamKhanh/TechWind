<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
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
            if ($item->variant) {
                return $item->variant->price * $item->quantity;
            }
            return 0; // Trường hợp variant bị null
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
        // Tìm sản phẩm và biến thể
        $product = Product::findOrFail($id);
        $variantId = $request->input('variant_id');
        $variant = $product->variants()->findOrFail($variantId);

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

        if ($cartItem) {
            // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
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
        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng.',
            'cart_quantity' => 1 // Trả về số lượng sản phẩm trong giỏ
        ]);
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

    public function wishlistToCart(Request $request, $id)
    {
        $user = Auth::user();

        // Tìm sản phẩm và biến thể trong wishlist
        $wishlistItem = Wishlist::where('user_id', $user->id)
            ->where('product_id', $id)
            ->where('variant_id', $request->input('variant_id'))
            ->first();

        if (!$wishlistItem) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong wishlist.');
        }

        // Thêm vào giỏ hàng
        $user->cart()->create([
            'product_id' => $wishlistItem->product_id,
            'variant_id' => $wishlistItem->variant_id,
            'quantity' => 1,
        ]);

        // Xóa khỏi wishlist
        $wishlistItem->delete();

        return redirect()->back()->with('success', 'Sản phẩm đã được chuyển sang giỏ hàng.');
    }
}
