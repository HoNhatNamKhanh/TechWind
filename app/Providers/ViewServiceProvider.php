<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Variant;
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
            $wishlistItems = [];

            // Kiểm tra xem người dùng đã đăng nhập
            if (Auth::check()) {
                $userId = Auth::id();

                // Lấy wishlist từ cơ sở dữ liệu
                $wishlist = Wishlist::where('user_id', $userId)->get();

                foreach ($wishlist as $item) {
                    $product = Product::find($item->product_id);
                    $variant = Variant::find($item->variant_id);

                    if ($product) {
                        $wishlistItems[] = [
                            'product' => $product,
                            'variant' => $variant,
                        ];
                    }
                }
            } else {
                // Lấy wishlist từ session nếu chưa đăng nhập
                $sessionWishlist = Session::get('wishlist', []);

                foreach ($sessionWishlist as $item) {
                    $product = Product::find($item['product_id']);
                    $variant = Variant::find($item['variant_id']);

                    if ($product) {
                        $wishlistItems[] = [
                            'product' => $product,
                            'variant' => $variant,
                        ];
                    }
                }
            }

            // Chia sẻ wishlist với các view
            $view->with('wishlistProducts', $wishlistItems);
        });
    }
}
