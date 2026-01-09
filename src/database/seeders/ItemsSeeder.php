<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テストユーザーを作成
        $user = User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // 商品データを作成
        $items = [
            [
                'user_id' => $user->id,
                'name' => '腕時計',
                'description' => "カラー：グレー\n\n新品\n商品の状態は良好です。傷や汚れはありません。\n\n購入後、即発送いたします。",
                'price' => 15000,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'category_id' => 1,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => 'HDD',
                'description' => "容量：2TB\n\n使用期間：1年\n動作確認済みです。",
                'price' => 5000,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'category_id' => 4,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => '玉ねぎ3束',
                'description' => "無農薬野菜です。\n新鮮な状態でお届けします。",
                'price' => 300,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'category_id' => 8,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => '革靴',
                'description' => "サイズ：26.5cm\n\n使用感はありますが、まだまだ履けます。",
                'price' => 4000,
                'image' => 'sample.jpg',
                'condition_id' => 3,
                'category_id' => 1,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => 'ノートPC',
                'description' => "メーカー：DELL\nメモリ：8GB\nSSD：256GB\n\n動作良好です。",
                'price' => 45000,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'category_id' => 4,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => 'マイク',
                'description' => "USB接続のマイクです。\nゲーム配信などに最適です。",
                'price' => 8000,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'category_id' => 4,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => 'ショルダーバッグ',
                'description' => "ブランド：ノーブランド\n\n収納力抜群です。",
                'price' => 3500,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'category_id' => 3,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => 'タンブラー',
                'description' => "保温・保冷機能付き\n容量：500ml",
                'price' => 2000,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'category_id' => 8,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => 'コーヒーミル',
                'description' => "手動タイプのコーヒーミルです。\nアウトドアにも最適。",
                'price' => 4000,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'category_id' => 8,
                'is_sold' => false,
            ],
            [
                'user_id' => $user->id,
                'name' => 'メイクセット',
                'description' => "未使用品多数\nまとめ売りです。",
                'price' => 2500,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'category_id' => 10,
                'is_sold' => false,
            ],
        ];

        DB::table('items')->insert($items);
    }
}
