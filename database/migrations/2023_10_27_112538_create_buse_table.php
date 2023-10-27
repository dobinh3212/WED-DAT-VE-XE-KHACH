<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuseTable extends Migration
{
    public function up()
    {
        Schema::create('buse', function (Blueprint $table) {
            $table->id();
            $table->integer('route_id')->nullable();
            $table->integer('driver_id')->nullable();
            $table->integer('coach_id')->nullable();
            $table->date('start_day')->nullable();
            $table->time('start_time')->nullable();
            $table->integer('is_active')->default(0);
            $table->integer('price')->nullable();
            $table->string('number_seat', 45)->nullable();
            $table->string('user_add_id', 45)->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('buse');
    }
}
