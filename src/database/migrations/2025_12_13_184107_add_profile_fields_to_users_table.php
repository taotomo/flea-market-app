<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->after('email_verified_at'); // プロフィール画像のパス（任意）
            $table->string('postal_code', 8)->nullable()->after('profile_image'); // 郵便番号（任意）
            $table->string('address')->nullable()->after('postal_code'); // 住所（任意）
            $table->string('building')->nullable()->after('address'); // 建物名（任意）
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile_image', 'postal_code', 'address', 'building']);
        });
    }
}
