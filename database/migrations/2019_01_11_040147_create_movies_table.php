<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->comment('名称');
            $table->char('year', 4)->nullable()->comment('上映年份');
            $table->string('countries', 4)->nullable()->comment('国家');
            $table->string('url', 200)->nullable()->comment('豆瓣地址');
            $table->decimal('score', 2, 1)->nullable()->default(0.0)->comment('评分');
            $table->string('genres', 4)->nullable()->comment('类型');
            $table->string('category', 20)->nullable()->comment('分类');
            $table->string('image', 200)->nullable()->comment('图片');
            $table->string('language', 10)->nullable()->comment('语言');
            $table->timestamps();
            $table->index('title');
            $table->index('year');
            $table->index('countries');
            $table->index('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
