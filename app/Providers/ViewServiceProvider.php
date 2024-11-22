<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $products = Product::all();
        $footerCategories = Category::withCount('products')
            ->orderByDesc('products_count')
            ->take(15)
            ->get();
        $categories = Category::withCount('products')
            ->orderByDesc('products_count')
            ->take(30)
            ->get();
        $chunkedCategories = $categories->chunk(10);

        View::share('products', $products);
        View::share('categories', $categories);
        View::share('chunkedCategories', $chunkedCategories);
        View::share('footerCategories', $footerCategories);

        View::composer(['home', 'layouts.header'], function ($view) {
            $products = [];
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (Auth::check()) {
                // Lấy sản phẩm từ wishlist của người dùng
                $userId = Auth::id();
                $wishlistProductIds = Wishlist::where('user_id', $userId)->pluck('product_id');
                $products = Product::whereIn('id', $wishlistProductIds)->get();
            } else {
                // Nếu chưa đăng nhập, lấy wishlist từ session
                $wishlistIds = Session::get('wishlist', []);
                $products = Product::whereIn('id', $wishlistIds)->get();
            }

            // Chia sẻ biến với view
            $view->with('wishlistProducts', $products);
        });
    }
}
