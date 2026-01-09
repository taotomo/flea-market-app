<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'postal_code',
        'address',
        'building',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 出品した商品（Item）とのリレーション
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    // いいね（Favorite）とのリレーション
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    // コメント（Comment）とのリレーション
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // 購入履歴（Purchase）とのリレーション
    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'buyer_id');
    }

    // いいねした商品を取得（多対多リレーション）
    public function favoriteItems()
    {
        return $this->belongsToMany(Item::class, 'favorites');
    }
}
