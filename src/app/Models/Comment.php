<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // 一括代入を許可するカラム
    protected $fillable = ['user_id', 'item_id', 'content'];

    // ユーザー（User）とのリレーション
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 商品（Item）とのリレーション
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
