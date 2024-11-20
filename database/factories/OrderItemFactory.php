<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Order;
use App\Models\Variant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 10), // Số lượng sản phẩm trong đơn hàng
            'price' => $this->faker->randomFloat(2, 50, 500), // Giá sản phẩm
            'total_price' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['price']; // Tính tổng giá trị
            },
            'order_id' => Order::factory(), // Liên kết với một đơn hàng ngẫu nhiên
            'product_id' => Product::factory(), // Liên kết với sản phẩm ngẫu nhiên
            'variant_id' => Variant::factory(), // Liên kết với biến thể sản phẩm ngẫu nhiên
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']), // Kích thước sản phẩm
            'color' => $this->faker->colorName(), // Màu sắc sản phẩm (được sinh ra ngẫu nhiên)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
