<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteBusTable extends Migration
{
    public function up()
    {
        Schema::create('route_bus', function (Blueprint $table) {
            $table->id()->comment('lộ trình');
            $table->string('user_create', 55)->nullable();
            $table->string('user_update', 55)->nullable();
            $table->string('departure', 255)->comment('nơi đi');
            $table->string('destination', 255)->comment('nơi đến');
            $table->string('rest_stops', 255)->comment('các trạm dừng chân');
            $table->integer('time_intend')->default(0);
            $table->string('km', 45)->nullable();
            $table->string('image', 245)->nullable();
            $table->string('route', 45)->nullable();
            $table->string('hot', 45)->nullable();
            $table->timestamps(0); // This creates created_at and updated_at as datetime columns.
        });
    }

    public function down()
    {
        Schema::dropIfExists('route_bus');
    }
}
