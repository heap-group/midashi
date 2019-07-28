<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // 投稿ID
            $table->bigIncrements('id');
            // 投稿タイトル
            $table->string('post_title');
            // 投稿内容
            $table->text('post_text');
            // 投稿カテゴリ
            $table->integer('category_id')
            ->unsigned();
            // 外部キー指定
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');
            // 投稿ユーザー
            $table->integer('post_create_user')
            ->unsigned();
            // 外部キー指定
            $table->foreign('post_create_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
