<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->id('token_id'); // Corrected primary key name
            $table->string('token', 255);
            $table->unsignedBigInteger('member_id');
            $table->string('expires', 255);
            $table->string('purpose', 255);
            $table->foreign('member_id')->references('member_id')->on('members');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tokens');
    }
}