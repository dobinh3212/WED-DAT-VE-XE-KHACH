<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeBusesTable extends Migration
{
    public function up()
    {
        Schema::create('type_buses', function (Blueprint $table) {
            $table->id()->comment('LOẠI XE');
            $table->string('type_bus', 255)->nullable()->comment('loại xe');
            $table->integer('seats')->nullable()->comment('số ghế');
            $table->integer('number_row')->nullable()->comment('số hàng');
            $table->integer('number_columns')->nullable()->comment('số cột');
            $table->string('diagram', 255)->nullable();
            $table->string('user_create', 55)->nullable();
            $table->string('user_update', 55)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('type_buses');
    }
}
