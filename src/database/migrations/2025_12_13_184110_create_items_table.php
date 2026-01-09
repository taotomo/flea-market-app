<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // 商品ID（主キー）
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // 出品者ID（usersテーブルへの外部キー、ユーザー削除時に商品も削除）
            $table->string('name'); // 商品名
            $table->text('description'); // 商品説明
            $table->unsignedInteger('price'); // 価格（正の整数のみ）
            $table->string('image'); // 商品画像のパス
            $table->foreignId('condition_id')->constrained()->onDelete('cascade'); // 商品の状態ID（conditionsテーブルへの外部キー）
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // カテゴリーID（categoriesテーブルへの外部キー）
            $table->boolean('is_sold')->default(false); // 売却済みフラグ（false:未売却、true:売却済み）
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
        Schema::dropIfExists('items');
    }
}
