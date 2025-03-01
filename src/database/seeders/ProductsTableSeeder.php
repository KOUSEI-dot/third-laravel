<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => '1',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => '腕時計',
            'price' => '15000',
            'description' => 'スタイリッシュなデザインのメンズ腕時計',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Armani+Mens+Clock.jpg',
            'condition' => '良好',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '2',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => 'HDD',
            'price' => '5000',
            'description' => '高速で信頼性の高いハードディスク',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/HDD+Hard+Disk.jpg',
            'condition' => '目立った傷や汚れなし',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '3',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => 'HDD',
            'price' => '300',
            'description' => '新鮮な玉ねぎ3束のセット',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/iLoveIMG+d.jpg',
            'condition' => 'やや傷や汚れあり',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '4',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => '革靴',
            'price' => '4000',
            'description' => 'クラシックなデザインの革靴',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Leather+Shoes+Product+Photo.jpg',
            'condition' => '状態が悪い',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '5',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => 'ノートPC',
            'price' => '45000',
            'description' => '高性能なノートパソコン',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Living+Room+Laptop.jpg',
            'condition' => '良好',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '6',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => 'マイク',
            'price' => '8000',
            'description' => '高音質のレコーディング用マイク',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Music+Mic+4632231.jpg',
            'condition' => '目立った傷や汚れなし',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '7',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => 'ショルダーバッグ',
            'price' => '3500',
            'description' => 'おしゃれなショルダーバッグ',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
            'condition' => 'やや傷や汚れあり',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '8',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => 'タンブラー',
            'price' => '500',
            'description' => '使いやすいタンブラー',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Purse+fashion+pocket.jpg',
            'condition' => 'やや傷や汚れあり',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '9',
            'user_id' => auth()->id(),  // ログイン中のユーザーIDを設定
            'name' => 'コーヒーミル',
            'price' => '4000',
            'description' => '手動のコーヒーミル',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/Waitress+with+Coffee+Grinder.jpg',
            'condition' => '良好',
        ];
        DB::table('products')->insert($param);
        $param = [
            'id' => '10',
            'user_id' => 1, // 直接ユーザーIDを指定（適切なIDに変更）加
            'name' => 'メイクセット',
            'price' => '2500',
            'description' => '便利なメイクアップセット',
            'image_path' => 'https://coachtech-matter.s3.ap-northeast-1.amazonaws.com/image/%E5%A4%96%E5%87%BA%E3%83%A1%E3%82%A4%E3%82%AF%E3%82%A2%E3%83%83%E3%83%95%E3%82%9A%E3%82%BB%E3%83%83%E3%83%88.jpg',
            'condition' => '目立った傷や汚れなし',
        ];
        DB::table('products')->insert($param);
        }
}

