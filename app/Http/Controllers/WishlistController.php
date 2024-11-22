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
    public function add($id)
    {
        // Nếu người dùng đã đăng nhập, lưu vào cơ sở dữ liệu
        if (Auth::check()) {
            $userId = Auth::id();
            $wishlist = Wishlist::where('user_id', $userId)->where('product_id', $id)->first();

            // Kiểm tra xem sản phẩm đã có trong wishlist chưa
            if (!$wishlist) {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $id,
                ]);
                return redirect()->back()->with('success', 'Product added to your wishlist!');
            }

            return redirect()->back()->with('info', 'Product is already in your wishlist.');
        }

        // Nếu người dùng chưa đăng nhập, lưu vào session
        $wishlist = Session::get('wishlist', []);
        if (!in_array($id, $wishlist)) {
            $wishlist[] = $id; // Thêm sản phẩm vào wishlist
            Session::put('wishlist', $wishlist);
            return redirect()->back()->with('success', 'Product added to wishlist!');
        }

        return redirect()->back()->with('info', 'Product is already in your wishlist.');
    }

    // Hiển thị wishlist (dành cho người dùng đã đăng nhập và chưa đăng nhập)
    public function showWishlist()
    {
        $wishlistProducts = [];

        // Nếu người dùng đã đăng nhập
        if (Auth::check()) {
            // Lấy tất cả sản phẩm từ wishlist của người dùng
            $userId = Auth::id();
            $wishlistProductIds = Wishlist::where('user_id', $userId)->pluck('product_id');
            $wishlistProducts = Product::whereIn('id', $wishlistProductIds)->get();
        } else {
            // Nếu người dùng chưa đăng nhập, lấy wishlist từ session
            $wishlistIds = Session::get('wishlist', []);
            $wishlistProducts = Product::whereIn('id', $wishlistIds)->get();
        }

        // Truyền dữ liệu vào view wishlist
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
