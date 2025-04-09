<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id('member_id'); // Corrected primary key name
            $table->string('forename', 254);
            $table->string('surname', 254);
            $table->string('email', 254)->unique();
            $table->string('password', 254);
            $table->timestamp('joined')->useCurrent();
            $table->string('picture', 254)->nullable();
            $table->string('role', 12)->default('admin');
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
}