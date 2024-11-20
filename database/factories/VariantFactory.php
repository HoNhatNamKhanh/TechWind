<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Variant;
class VariantFactory extends Factory
{
    protected $model = Variant::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),  // Sử dụng factory của Product để gán product_id
            'image' => 'default-product.png',
            'color' => $this->faker->colorName(),
            'size' => $this->faker->randomElement(['S', 'M', 'L', 'XL']),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => $this->faker->numberBetween(0, 100),
            'product_id' => Product::factory(), // Liên kết với một sản phẩm ngẫu nhiên
        ];
    }
}
