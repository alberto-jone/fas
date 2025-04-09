<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('member_id');

            $table->primary(['article_id', 'member_id']);
            $table->foreign('article_id')->references('article_id')->on('articles');
            $table->foreign('member_id')->references('member_id')->on('members');
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}