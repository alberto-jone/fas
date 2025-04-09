<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id('article_id'); // Corrected primary key name
            $table->string('title', 80)->unique();
            $table->string('summary', 254);
            $table->text('content');
            $table->timestamp('created')->useCurrent();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->tinyInteger('published')->default(0);
            $table->string('seo_title', 244);

            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('member_id')->references('member_id')->on('members');
            $table->foreign('image_id')->references('image_id')->on('images');
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}