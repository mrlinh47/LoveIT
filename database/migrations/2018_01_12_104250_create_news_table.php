<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mll02_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('alias');
            $table->string('author')->nullable();
            $table->text('introtext')->nullable();
            $table->text('fulltext')->nullable();
            $table->string('image')->nullable();
            $table->integer('publish')->default('1');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('mll02_category')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('mll02_users')->onDelete('cascade');
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
        Schema::dropIfExists('mll02_news');
    }
}
