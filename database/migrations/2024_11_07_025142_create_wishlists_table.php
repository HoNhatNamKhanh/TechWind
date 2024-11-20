<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Liên kết với người dùng
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Liên kết với sản phẩm
            $table->foreignId('variant_id')->nullable()->constrained()->onDelete('cascade');  // Liên kết với biến thể (có thể null)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}
