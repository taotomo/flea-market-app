<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;

    // 一括代入を許可するカラム
    protected $fillable = ['name'];

    // 商品（Item）とのリレーション
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
