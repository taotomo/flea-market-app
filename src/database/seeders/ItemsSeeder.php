<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 複数のテストユーザーを作成
        $users = [
            [
                'name' => '田中太郎',
                'email' => 'tanaka@example.com',
                'password' => bcrypt('password'),
                'postal_code' => '123-4567',
                'address' => '東京都渋谷区1-1-1',
                'building' => 'テストマンション101',
            ],
            [
                'name' => '佐藤花子',
                'email' => 'sato@example.com',
                'password' => bcrypt('password'),
                'postal_code' => '456-7890',
                'address' => '大阪府大阪市2-2-2',
                'building' => null,
            ],
            [
                'name' => '山田一郎',
                'email' => 'yamada@example.com',
                'password' => bcrypt('password'),
                'postal_code' => '789-0123',
                'address' => '愛知県名古屋市3-3-3',
                'building' => 'サンプルビル202',
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }

        $createdUsers = User::all();

        // 商品データを作成
        $itemsData = [
            [
                'user_id' => $createdUsers[0]->id,
                'name' => '腕時計',
                'brand' => 'セイコー',
                'description' => "カラー：シルバー\n\n新品\n商品の状態は良好です。傷や汚れはありません。\n\n購入後、即発送いたします。",
                'price' => 15000,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'categories' => [1], // ファッション
            ],
            [
                'user_id' => $createdUsers[0]->id,
                'name' => 'HDD 2TB',
                'brand' => 'Western Digital',
                'description' => "容量：2TB\n\n使用期間：1年\n動作確認済みです。データ移行にも最適です。",
                'price' => 5000,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'categories' => [4], // 家電
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'name' => 'iPhone 13',
                'brand' => 'Apple',
                'description' => "色：ブラック\n容量：128GB\n\nSIMフリー版です。画面に細かい傷がありますが動作に問題ありません。",
                'price' => 65000,
                'image' => 'sample.jpg',
                'condition_id' => 3,
                'categories' => [4], // 家電
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'name' => 'ナイキ エアマックス',
                'brand' => 'NIKE',
                'description' => "サイズ：26.5cm\n\n数回着用のみの美品です。箱付きです。",
                'price' => 8000,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'categories' => [1, 2], // ファッション、メンズ
            ],
            [
                'user_id' => $createdUsers[2]->id,
                'name' => 'MacBook Pro',
                'brand' => 'Apple',
                'description' => "2021年モデル\nメモリ：16GB\nSSD：512GB\n\n動作良好です。充電器付き。",
                'price' => 150000,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'categories' => [4], // 家電
            ],
            [
                'user_id' => $createdUsers[2]->id,
                'name' => 'ワイヤレスマイク',
                'brand' => 'SHURE',
                'description' => "プロ仕様のワイヤレスマイクです。\nライブや配信に最適です。",
                'price' => 25000,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'categories' => [4, 6], // 家電、ゲーム
            ],
            [
                'user_id' => $createdUsers[0]->id,
                'name' => 'ルイヴィトン バッグ',
                'brand' => 'Louis Vuitton',
                'description' => "正規品\nモノグラム柄のハンドバッグです。\n多少の使用感はありますが、まだまだお使いいただけます。",
                'price' => 45000,
                'image' => 'sample.jpg',
                'condition_id' => 3,
                'categories' => [1, 3], // ファッション、レディース
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'name' => 'スターバックス タンブラー',
                'brand' => 'Starbucks',
                'description' => "限定デザインのタンブラーです。\n保温・保冷機能付き\n容量：473ml",
                'price' => 2000,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'categories' => [8], // インテリア
            ],
            [
                'user_id' => $createdUsers[2]->id,
                'name' => 'ハリオ コーヒーミル',
                'brand' => 'HARIO',
                'description' => "手動タイプのコーヒーミルです。\nアウトドアにも最適。\nセラミック製で錆びません。",
                'price' => 4000,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'categories' => [8], // インテリア
            ],
            [
                'user_id' => $createdUsers[0]->id,
                'name' => 'シャネル メイクセット',
                'brand' => 'CHANEL',
                'description' => "未使用品多数\nリップ、アイシャドウ等のセットです。\nギフトにも最適。",
                'price' => 8500,
                'image' => 'sample.jpg',
                'condition_id' => 1,
                'categories' => [10], // コスメ
            ],
            [
                'user_id' => $createdUsers[1]->id,
                'name' => 'Nintendo Switch',
                'brand' => 'Nintendo',
                'description' => "本体・ドック・コントローラー全て揃っています。\n動作確認済み。\nケースもお付けします。",
                'price' => 25000,
                'image' => 'sample.jpg',
                'condition_id' => 2,
                'categories' => [6, 9], // ゲーム、おもちゃ
            ],
        ];

        // 商品を作成し、カテゴリーを関連付け
        foreach ($itemsData as $itemData) {
            $categories = $itemData['categories'];
            unset($itemData['categories']);
            
            $item = Item::create($itemData);
            $item->categories()->attach($categories);
        }
    }
}
