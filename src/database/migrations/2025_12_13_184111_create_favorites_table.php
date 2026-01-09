<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->id(); // いいねID（主キー）
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID（usersテーブルへの外部キー、ユーザー削除時にいいねも削除）
            $table->foreignId('item_id')->constrained()->onDelete('cascade'); // 商品ID（itemsテーブルへの外部キー、商品削除時にいいねも削除）
            $table->timestamps(); // created_at, updated_at
            
            // 同じユーザーが同じ商品に複数回いいねできないようにする（ユニーク制約）
            $table->unique(['user_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
