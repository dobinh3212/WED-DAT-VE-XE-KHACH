<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntroduceTable extends Migration
{
    public function up()
    {
        Schema::create('introduce', function (Blueprint $table) {
            $table->id('id')->comment('giới thiệu');
            $table->text('content');
            $table->unsignedBigInteger('user_id_create');
            $table->unsignedBigInteger('user_id_update');
            $table->timestamps();
        });

        Schema::table('introduce', function (Blueprint $table) {
            $table->foreign('user_id_create')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('user_id_update')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    public function down()
    {
        Schema::dropIfExists('introduce');
    }
}
