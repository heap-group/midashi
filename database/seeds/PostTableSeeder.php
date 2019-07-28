<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'post_id' => 1,
            'post_title' => '第1投稿',
            'post_text' => 'hogehogehogehoge',
            'post_create_user' => 1 
        ];

        DB::table('posts')->insert($param);

        $param = [
            'post_id' => 2,
            'post_title' => '第2投稿',
            'post_text' => 'hogehogehogehoge',
            'post_create_user' => 1 
        ];

        DB::table('posts')->insert($param);

        $param = [
            'post_id' => 3,
            'post_title' => '第3投稿',
            'post_text' => 'hogehogehogehoge',
            'post_create_user' => 1 
        ];

        DB::table('posts')->insert($param);
    }
}
