<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->comment('文章id关联');
            $table->string('image_url',255)->comment('图片转发链接');
            $table->string('origin_image_url',255)->comment('远程图片路径');
            $table->tinyInteger('type')->comment('图片类型（内容图片 or 缩略图）');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
