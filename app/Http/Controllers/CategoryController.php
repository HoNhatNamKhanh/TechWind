<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Variant;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Lấy tham số category_id từ URL (có thể là một mảng)
        $categoryIds = $request->input('category_id');  // Đây có thể là một mảng, nếu có nhiều category_id

        // Lấy tham số search từ URL (nếu có)
        $search = $request->input('search');

        // Lấy tham số giá (min_price và max_price)
        $minPriceInDb = Variant::min('price');  // Lấy giá thấp nhất từ variant
        $maxPriceInDb = Variant::max('price');  // Lấy giá cao nhất từ variant

        // Làm tròn minPrice xuống và maxPrice lên chia hết cho 10
        $minPriceInDb = floor($minPriceInDb / 10) * 10;  // Làm tròn xuống bội số của 10
        $maxPriceInDb = ceil($maxPriceInDb / 10) * 10;  // Làm tròn lên bội số của 10

        // Nếu không có giá trị min_price hoặc max_price, sử dụng giá trị trong request hoặc giá trị mặc định
        $minPrice = $request->input('min_price', $minPriceInDb);  // Mặc định là minPrice từ DB nếu không có trong request
        $maxPrice = $request->input('max_price', $maxPriceInDb);  // Mặc định là maxPrice từ DB nếu không có trong request

        // Khởi tạo category và products mặc định
        $category = null;
        $productsQuery = Product::query();

        // Nếu có category_id, lọc sản phẩm theo category_id
        if ($categoryIds) {
            if (is_array($categoryIds)) {
                $productsQuery = $productsQuery->whereIn('category_id', $categoryIds);
            } else {
                $productsQuery = $productsQuery->where('category_id', $categoryIds);
            }
        }

        // Nếu có tìm kiếm từ khóa, lọc sản phẩm theo tên
        if ($search) {
            $productsQuery = $productsQuery->where('name', 'like', '%' . $search . '%');
        }

        // Lọc theo giá (nếu có)
        if ($minPrice || $maxPrice) {
            $productsQuery = $productsQuery->whereHas('variants', function ($query) use ($minPrice, $maxPrice) {
                if ($minPrice) {
                    $query->where('price', '>=', $minPrice);
                }
                if ($maxPrice) {
                    $query->where('price', '<=', $maxPrice);
                }
            });
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
        return view('grid', compact('products', 'categories', 'category', 'search', 'minPriceInDb', 'maxPriceInDb', 'minPrice', 'maxPrice'));
    }


}
