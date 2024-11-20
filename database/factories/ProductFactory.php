<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // Tạo tên sản phẩm ngẫu nhiên
            'description' => $this->faker->paragraph(),
            'view' => $this->faker->numberBetween(0, 1000),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'category_id' => \App\Models\Category::factory(), // Liên kết với Category
        ];
    }

    /**
     * Tạo variants cho mỗi sản phẩm
     *
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function hasVariants(int $count = 3)
    {
        return $this->has(\App\Models\Variant::factory()->count($count), 'variants');
    }
}
