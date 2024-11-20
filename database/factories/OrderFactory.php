<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uniqueCode = $this->generateUniqueOrderCode();

        return [
            'code' => $uniqueCode, // Sử dụng mã đơn hàng duy nhất
            'status' => $this->faker->randomElement(['pending', 'completed', 'cancelled']),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'user_id' => User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * Generate a unique order code by checking existing codes.
     *
     * @return string
     */
    private function generateUniqueOrderCode(): string
    {
        do {
            $code = 'ORD' . $this->faker->unique()->numerify('###'); // Tạo mã mới
        } while (\App\Models\Order::where('code', $code)->exists()); // Kiểm tra sự tồn tại của mã trong DB

        return $code; // Trả về mã duy nhất
    }
}
