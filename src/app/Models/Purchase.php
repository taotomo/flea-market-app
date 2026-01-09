<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // 一括代入を許可するカラム
    protected $fillable = [
        'item_id',
        'buyer_id',
        'payment_method',
        'postal_code',
        'address',
        'building',
    ];

    // 購入者（User）とのリレーション
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    // 商品（Item）とのリレーション
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
