<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Lấy tham số category_id từ URL (có thể là một mảng)
        $categoryIds = $request->input('category_id');  // Đây có thể là một mảng, nếu có nhiều category_id

        // Lấy tham số search từ URL (nếu có)
        $search = $request->input('search');

        // Khởi tạo category và products mặc định
        $category = null;
        $productsQuery = Product::query();

        // Nếu có category_id, lọc sản phẩm theo category_id
        if ($categoryIds) {
            // Kiểm tra xem $categoryIds có phải là mảng hay không
            if (is_array($categoryIds)) {
                $productsQuery = $productsQuery->whereIn('category_id', $categoryIds);
            } else {
                // Nếu là giá trị đơn, chỉ lọc theo category_id đó
                $productsQuery = $productsQuery->where('category_id', $categoryIds);
            }
        }

        // Nếu có tìm kiếm từ khóa, lọc sản phẩm theo tên
        if ($search) {
            $productsQuery = $productsQuery->where('name', 'like', '%' . $search . '%');
        }

        // Phân trang kết quả, sử dụng paginate thay vì get
        $products = $productsQuery->paginate(12);

        // Tính toán rating cho từng sản phẩm
        foreach ($products as $product) {
            $reviews = $product->reviews;
            $averageRating = $reviews->avg('rating'); // Tính trung bình rating cho sản phẩm
            $product->averageRating = $averageRating;
            $product->reviewCount = $reviews->count(); // Số lượng đánh giá của sản phẩm
        }

        // Lấy tất cả danh mục để hiển thị trên giao diện
        $categories = Category::all();

        // Trả về view với các sản phẩm, danh mục và ratings
        return view('grid', compact('products', 'categories', 'category', 'search'));
    }

}
