<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('channel_id')->comment('栏目');
            $table->string('origin')->comment('来源');
            $table->string('writer')->comment('作者');
            $table->string('title')->comment('标题');
            $table->string('keyword')->comment('关键词');
            $table->string('description')->comment('描述');
            $table->string('thumbnail')->comment('缩略图');
            $table->tinyInteger('top')->comment('首页推荐');
            $table->smallInteger('hots')->comment('热度');
            $table->tinyInteger('active')->comment('人工审核');
            //$table->text('content')->comment('内容'); 做了分表 不需要了
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
        Schema::dropIfExists('articles');
    }
}
