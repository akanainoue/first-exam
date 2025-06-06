<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        'content' => '商品のお届けについて',
        ];
        DB::table('categories')->insert($param);
        $param = [
        'content' => '商品の交換について',
        ];
        DB::table('categories')->insert($param);
        $param = [
        'content' => '商品トラブル',
        ];
        DB::table('categories')->insert($param);
        $param = [
        'content' => 'ショップへのお問い合わせ',
        ];
        DB::table('categories')->insert($param);
        $param = [
        'content' => 'その他',
        ];
        DB::table('categories')->insert($param);
    }
    /*$categories = [
            ['content' => '商品のお届けについて'],
            ['content' => '商品の交換について'],
            ['content' => '商品トラブル'],
            ['content' => 'ショップへのお問い合わせ'],
            ['content' => 'その他'],
        ];

        DB::table('categories')->insert($categories);*/
}
