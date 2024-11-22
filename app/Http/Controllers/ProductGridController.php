<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductGridController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm, có thể phân trang hoặc giới hạn số lượng nếu cần
        $products = Product::orderBy('created_at', 'desc')->paginate(12); // hoặc ->limit(12)->get();

        return view('grid', compact('products'));
    }
    public function search(Request $request)
    {
        // Lấy giá trị từ form tìm kiếm
        $query = $request->input('s'); // Từ khóa tìm kiếm theo tên (có thể rỗng)
        $minPrice = $request->input('min_price'); // Lấy giá từ
        $maxPrice = $request->input('max_price'); // Lấy giá đến

        // Bắt đầu truy vấn sản phẩm
        $productsQuery = Product::query();

        // Nếu có từ khóa tìm kiếm (tìm theo tên hoặc mô tả)
        if ($query) {
            $productsQuery->where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%");
        }

        // Nếu có giá từ, thêm điều kiện lọc theo giá từ
        if ($minPrice) {
            $productsQuery->whereHas('variants', function ($query) use ($minPrice) {
                $query->where('price', '>=', $minPrice);
            });
        }

        // Nếu có giá đến, thêm điều kiện lọc theo giá đến
        if ($maxPrice) {
            $productsQuery->whereHas('variants', function ($query) use ($maxPrice) {
                $query->where('price', '<=', $maxPrice);
            });
        }

        // Lấy danh sách sản phẩm, có thể phân trang nếu cần
        $products = $productsQuery->paginate(12);

        return view('search-results', compact('products', 'query', 'minPrice', 'maxPrice'));
    }

}
