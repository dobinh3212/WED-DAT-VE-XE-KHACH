<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuongDiTable extends Migration
{
    public function up()
    {
        Schema::create('duong_di', function (Blueprint $table) {
            $table->id('Mã');
            $table->foreignId('Mã_Trạm_Start');
            $table->foreignId('Mã_Trạm_End');
            $table->text('Tọa_độ_detail');
            $table->timestamps();
        });

        Schema::table('duong_di', function (Blueprint $table) {
            $table->foreign('Mã_Trạm_Start')->references('id')->on('bus_stop')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('Mã_Trạm_End')->references('id')->on('bus_stop')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    public function down()
    {
        Schema::dropIfExists('duong_di');
    }
}
