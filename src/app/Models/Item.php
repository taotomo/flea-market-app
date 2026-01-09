<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // 一括代入を許可するカラム
    protected $fillable = [
        'user_id',
        'name',
        'brand',
        'description',
        'price',
        'image',
        'condition_id',
        'is_sold',
    ];

    // 出品者（User）とのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 商品の状態（Condition）とのリレーション
    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    // カテゴリ（Category）との多対多リレーション
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_item');
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
    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }
}
