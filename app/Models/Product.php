<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'description',
        'view',
        'status',
        'category_id',
    ];

    // Quan hệ với Variant
    public function variants()
    {
        return $this->hasMany(Variant::class);
    }

    // Quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Quan hệ với Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Quan hệ với OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Quan hệ với User thông qua bảng pivot wishlist_user
    public function users()
    {
        return $this->belongsToMany(User::class, 'wishlist_user', 'product_id', 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Cập nhật trạng thái sản phẩm
        static::saving(function ($product) {
            $totalStock = $product->variants()->sum('stock');
            $product->status = $totalStock > 0 ? 'in stock' : 'out of stock';
        });

        static::updated(function ($product) {
            $totalStock = $product->variants()->sum('stock');
            $product->status = $totalStock > 0 ? 'in stock' : 'out of stock';
            $product->saveQuietly();
        });
    }
}
