<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('category_id'); // Corrected primary key name
            $table->string('name', 24)->unique();
            $table->string('description', 254);
            $table->tinyInteger('navigation');
            $table->string('seo_name', 244);
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}