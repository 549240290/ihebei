<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->smallInteger('pid')->comment('父id');
            $table->string('title',255)->comment('频道名称');
            $table->string('description',255)->comment('频道描述');
            $table->smallInteger('sort')->comment('频道排序');
            $table->string('template')->comment('栏目模板');
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
        Schema::dropIfExists('channels');
    }
}
