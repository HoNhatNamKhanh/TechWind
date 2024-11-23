<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail');
            $table->string('name');
            $table->timestamps(); // Thêm cột created_at và updated_at

        });
        DB::table('banners')->insert([
            [
                'thumbnail' => 'banner.jpg',
                'name' => 'Banner 1',
            ],
            [
                'thumbnail' => 'banner.jpg',
                'name' => 'Banner 2',
            ],
            [
                'thumbnail' => 'banner.jpg',
                'name' => 'Banner 3',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');

    }
};
