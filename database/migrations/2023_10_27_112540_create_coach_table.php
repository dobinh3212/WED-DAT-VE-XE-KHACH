<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachTable extends Migration
{
    public function up()
    {
        Schema::create('coach', function (Blueprint $table) {
            $table->id();
            $table->string('license_plate');
            $table->unsignedBigInteger('type_car_id');
            $table->integer('number_seat');
            $table->integer('is_active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coach');
    }
}
