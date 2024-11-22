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
        $query = $request->input('s'); // Lấy từ khóa tìm kiếm
        $products = Product::query()
            ->where('name', 'LIKE', "%{$query}%") // Lọc sản phẩm theo tên
            ->orWhere('description', 'LIKE', "%{$query}%") // Lọc theo mô tả (nếu cần)
            ->get();

        return view('search-results', compact('products', 'query'));
    }
}
