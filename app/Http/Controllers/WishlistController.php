<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variant;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    // Thêm sản phẩm vào wishlist
    public function add($id, Request $request)
    {
        $variantId = $request->input('variant_id');

        if (Auth::check()) {
            $userId = Auth::id();
            $wishlist = Wishlist::where('user_id', $userId)
                ->where('product_id', $id)
                ->where('variant_id', $variantId)
                ->first();

            if (!$wishlist) {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $id,
                    'variant_id' => $variantId,
                ]);
                return redirect()->back()->with('success', 'Product with variant added to your wishlist!');
            }

            return redirect()->back()->with('info', 'Product with this variant is already in your wishlist.');
        }

        // Lưu vào session nếu chưa đăng nhập
        $wishlist = Session::get('wishlist', []);
        $wishlistKey = $id . '-' . $variantId;
        if (!array_key_exists($wishlistKey, $wishlist)) {
            $wishlist[$wishlistKey] = ['product_id' => $id, 'variant_id' => $variantId];
            Session::put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product with variant added to wishlist!');
        }

        return redirect()->back()->with('info', 'Product with this variant is already in your wishlist.');
    }

    // Hiển thị wishlist
    public function showWishlist()
    {
        $wishlistProducts = [];

        if (Auth::check()) {
            $userId = Auth::id();
            $wishlist = Wishlist::where('user_id', $userId)->get();

            foreach ($wishlist as $item) {
                $product = Product::find($item->product_id);
                $variant = Variant::find($item->variant_id);
                if ($product && $variant) {
                    $wishlistProducts[] = [
                        'product' => $product,
                        'variant' => $variant,
                    ];
                }
            }
        } else {
            $wishlistItems = Session::get('wishlist', []);
            foreach ($wishlistItems as $item) {
                $product = Product::find($item['product_id']);
                $variant = Variant::find($item['variant_id']);
                if ($product && $variant) {
                    $wishlistProducts[] = [
                        'product' => $product,
                        'variant' => $variant,
                    ];
                }
            }
        }

        return view('wishlist', compact('wishlistProducts'));
    }

    // Xóa sản phẩm khỏi wishlist
    public function remove($productId)
    {
        if (Auth::check()) {
            // Xóa sản phẩm khỏi cơ sở dữ liệu nếu người dùng đã đăng nhập
            $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->first();
            if ($wishlist) {
                $wishlist->delete();
                return back()->with('success', 'Product removed from your wishlist!');
            }
        } else {
            // Xóa sản phẩm khỏi session nếu người dùng chưa đăng nhập
            $wishlist = Session::get('wishlist', []);
            if (($key = array_search($productId, $wishlist)) !== false) {
                unset($wishlist[$key]);
                Session::put('wishlist', array_values($wishlist)); // Cập nhật session
                return back()->with('success', 'Product removed from wishlist!');
            }
        }

        return back()->with('error', 'Product not found in your wishlist.');
    }
}
