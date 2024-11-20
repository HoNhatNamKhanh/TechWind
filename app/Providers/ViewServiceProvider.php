<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
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
        $products = Product::all(); // Lấy tất cả sản phẩm
        $footerCategories = Category::withCount('products')  // Đếm số lượng sản phẩm trong mỗi danh mục
            ->orderByDesc('products_count')  // Sắp xếp theo số lượng sản phẩm giảm dần
            ->take(15)  // Lấy 6 danh mục có nhiều sản phẩm nhất
            ->get();
        $categories = Category::withCount('products')  // Đếm số lượng sản phẩm trong mỗi danh mục
            ->orderByDesc('products_count')  // Sắp xếp theo số lượng sản phẩm giảm dần
            ->take(30)  // Lấy 6 danh mục có nhiều sản phẩm nhất
            ->get();
        $chunkedCategories = $categories->chunk(10); // Chia thành các nhóm 10 danh mục

        View::share('products', $products);
        View::share('categories', $categories);
        View::share('chunkedCategories', $chunkedCategories);
        View::share('footerCategories', $footerCategories);
    }
}
