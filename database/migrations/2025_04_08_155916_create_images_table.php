<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id('image_id'); // Corrected primary key name
            $table->string('file', 254);
            $table->string('alt', 1000);
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}