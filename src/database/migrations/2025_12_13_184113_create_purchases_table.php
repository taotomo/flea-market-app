<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // 購入履歴ID（主キー）
            $table->foreignId('item_id')->constrained()->onDelete('cascade'); // 商品ID（itemsテーブルへの外部キー、商品削除時に購入履歴も削除）
            $table->foreignId('buyer_id')->references('id')->on('users')->onDelete('cascade'); // 購入者ID（usersテーブルへの外部キー、ユーザー削除時に購入履歴も削除）
            $table->string('payment_method', 50); // 支払い方法（例：クレジットカード、コンビニ支払い、など）
            $table->string('postal_code', 8); // 配送先郵便番号
            $table->string('address'); // 配送先住所
            $table->string('building')->nullable(); // 配送先建物名（任意）
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
