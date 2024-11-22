<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function submitReview(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        try {
            // Validate các dữ liệu từ form
            $validated = $request->validate([
                'rating' => 'required|integer|between:1,5',
                'comment' => 'nullable|string|max:500',
            ]);

            // Tạo mới review
            $review = new Review();
            $review->product_id = $product->id;
            $review->user_id = Auth::id();
            $review->rating = $request->input('rating');
            $review->comment = $request->input('comment');
            $review->save();

            // Tính toán đánh giá trung bình và số lượng đánh giá
            $averageRating = $product->reviews()->avg('rating');
            $reviewCount = $product->reviews()->count();

            // Lấy thông tin người dùng và trả về
            $user = Auth::user();
            $reviewData = [
                'name' => $user->name,
                'avatar' => $user->avatar ? asset('storage/' . $user->avatar) : asset('default-avatar.jpg'),
                'created_at' => $review->created_at->format('jS F Y \a\t h:i A'),
                'rating' => $review->rating,
                'comment' => $review->comment,
            ];

            return response()->json([
                'average_rating' => $averageRating,
                'review_count' => $reviewCount,
                'review_data' => $reviewData, // Trả về thông tin review chi tiết
                'message' => 'Đánh giá của bạn đã được gửi thành công!'
            ]);

        } catch (\Exception $e) {
            // Log lỗi để xem chi tiết
            \Log::error("Lỗi khi gửi đánh giá: " . $e->getMessage());
            return response()->json([
                'error' => 'Đã có lỗi xảy ra khi gửi đánh giá. Vui lòng thử lại sau.'
            ], 500);
        }
    }

}
