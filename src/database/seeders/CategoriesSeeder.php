<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => '洋服'],
            ['name' => 'メンズ'],
            ['name' => 'レディース'],
            ['name' => '家電'],
            ['name' => '本'],
            ['name' => 'ゲーム'],
            ['name' => 'スポーツ'],
            ['name' => 'インテリア'],
            ['name' => 'おもちゃ'],
            ['name' => 'コスメ'],
        ];

        DB::table('categories')->insert($categories);
    }
}
