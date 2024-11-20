<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function userMeta()
    {
        return $this->hasOne(UserMeta::class);
    }

    // Quan hệ với bảng Cart
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    // Quan hệ với bảng Product thông qua wishlist_user
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlist_user', 'user_id', 'product_id');
    }
}
