<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    // Thêm sản phẩm vào wishlist
    public function add(Request $request, $id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $variantId = $request->input('variant_id'); // Lấy variant_id từ request

            // Kiểm tra xem sản phẩm và biến thể đã có trong wishlist chưa
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
                return back()->with('success', 'Product added to your wishlist!');
            }

            return back()->with('info', 'Product is already in your wishlist.');
        }

        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm Wishlist.');
    }

    // Hiển thị wishlist (dành cho người dùng đã đăng nhập và chưa đăng nhập)
    public function showWishlist()
    {
        // Khởi tạo danh sách wishlist trống
        $wishlistProducts = collect();

        if (Auth::check()) {
            $userId = Auth::id();
            $wishlistProducts = Wishlist::with(['product', 'product.variants'])
                ->where('user_id', $userId)
                ->get()
                ->map(function ($wishlistItem) {
                    return [
                        'product' => $wishlistItem->product,
                        'variant' => $wishlistItem->product->variants->firstWhere('id', $wishlistItem->variant_id),
                    ];
                });
        } else {
            $wishlistIds = Session::get('wishlist', []);
            $wishlistProducts = Product::with('variants')
                ->whereIn('id', $wishlistIds)
                ->get()
                ->map(function ($product) {
                    return ['product' => $product, 'variant' => null];
                });
        }

        dd($wishlistProducts); // Debugging step

        return view('layouts.header', compact('wishlistProducts'));
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

    public function migrateWishlistToDatabase()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $wishlistIds = Session::get('wishlist', []);

            foreach ($wishlistIds as $id) {
                // Kiểm tra xem sản phẩm đã có trong cơ sở dữ liệu chưa
                if (!Wishlist::where('user_id', $user->id)->where('product_id', $id)->exists()) {
                    Wishlist::create([
                        'user_id' => $user->id,
                        'product_id' => $id,
                    ]);
                }
            }

            // Xóa wishlist trong session sau khi migrate
            Session::forget('wishlist');

            return redirect()->route('wishlist.index')->with('success', 'Wishlist đã được chuyển vào tài khoản của bạn.');
        }

        return redirect()->route('login');
    }
}
