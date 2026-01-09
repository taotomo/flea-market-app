<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesSeeder::class,
            ConditionsSeeder::class,
            ItemsSeeder::class, // ユーザーと商品を同時に作成
        ]);
    }
}
