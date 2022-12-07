<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'リーバイス デニム',
                'user_id' => '1',
                'description' => 'リーバイス501のデニムパンツです。',
                'price' => '12500',
                'category_name' => 'デニム',
                'image_path' => 'リーバイス.jpeg',
            ],
            [
                'name' => 'リーバイス ブラック デニム',
                'user_id' => '1',
                'description' => 'リーバイスのブラックデニムです。ビンテージ商品になります。',
                'price' => '13500',
                'category_name' => 'デニム',
                'image_path' => 'リーバイスblack.jpeg',
            ],
            [
                'name' => 'リーバイス デニムジャケット',
                'user_id' => '2',
                'description' => 'リーバイスのデニムジャケットです。',
                'price' => '15500',
                'category_name' => 'ジャケット',
                'image_path' => 'リーバイス デニムジャケット.jpeg',
            ],
            [
                'name' => 'nike aj1 シカゴ',
                'user_id' => '2',
                'description' => '最近発売された大人気カラーシカゴの復刻になります。',
                'price' => '62500',
                'category_name' => 'スニーカー',
                'image_path' => 'nike aj1 シカゴ.jpeg',
            ],
            [
                'name' => 'アークテリクス マウンテンパーカー',
                'user_id' => '2',
                'description' => '今年流行っているアークテリクスのマウンテンパーカーです。使用感あり',
                'price' => '32500',
                'category_name' => 'ジャケット',
                'image_path' => 'アークテリクス.jpeg',
            ],
            [
                'name' => 'アディダス　samba',
                'user_id' => '1',
                'description' => 'アディダスのサンバヴィーガンです。',
                'price' => '22500',
                'category_name' => 'スニーカー',
                'image_path' => 'アディダスsambaビーガン.webp',
            ],
            [
                'name' => 'アディダス samba black',
                'user_id' => '3',
                'description' => 'アディダスsambaです。大人気のブラックです。',
                'price' => '25500',
                'category_name' => 'スニーカー',
                'image_path' => 'アディダスsanba黒.jpeg',
            ],
            [
                'name' => 'ナイキ　エアフォース',
                'user_id' => '1',
                'description' => 'ナイキ エアフォース1です。多少使用感あり。',
                'price' => '6500',
                'category_name' => 'スニーカー',
                'image_path' => 'エアフォース.webp',
            ],[
                'name' => 'ノースフェイス ヌプシジャケット',
                'user_id' => '2',
                'description' => 'ノースフェイス定番のヌプシジャケットです。色は大人気のブラックです。',
                'price' => '37500',
                'category_name' => 'ジャケット',
                'image_path' => 'ヌプシ.webp',
            ],
            [
                'name' => 'バブアー　ジャケット',
                'user_id' => '3',
                'description' => 'バブアーのジャケット',
                'price' => '42500',
                'category_name' => 'ジャケット',
                'image_path' => 'バブアー.jpeg',
            ],
            [
                'name' => 'ノースフェイス　バルトロ',
                'user_id' => '3',
                'description' => 'バルトロジャケット',
                'price' => '12500',
                'category_name' => 'ジャケット',
                'image_path' => 'バルトロ.jpeg',
            ],
        ]);
    }
}
