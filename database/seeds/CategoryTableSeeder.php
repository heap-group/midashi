<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'category_id' => 1,
            'post_id' => 1,
            'category_name' => 'カテゴリ1',
            'category_create_user' => 1
        ];

        DB::table('categories')->insert($param);

        $param = [
            'category_id' => 2,
            'post_id' => 1,
            'category_name' => 'カテゴリ2',
            'category_create_user' => 1
        ];

        DB::table('categories')->insert($param);

        $param = [
            'category_id' => 3,
            'post_id' => 1,
            'category_name' => 'カテゴリ3',
            'category_create_user' => 1
        ];

        DB::table('categories')->insert($param);
    }
}
