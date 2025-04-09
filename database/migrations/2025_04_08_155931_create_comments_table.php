<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id('comment_id'); // Corrected primary key name
            $table->string('comment', 4000);
            $table->dateTime('posted')->useCurrent();
            $table->unsignedBigInteger('article_id');
            $table->unsignedBigInteger('member_id');

            $table->foreign('article_id')->references('article_id')->on('articles');
            $table->foreign('member_id')->references('member_id')->on('members');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}