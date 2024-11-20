<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'variant_id'];

    // Mối quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Mối quan hệ với Variant (nếu cần)
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
}
