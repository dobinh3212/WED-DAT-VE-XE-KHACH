<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThongKeTable extends Migration
{
    public function up()
    {
        Schema::create('thong_ke', function (Blueprint $table) {
            $table->id('Mã');
            $table->integer('Tháng');
            $table->integer('Năm');
            $table->integer('Số_chuyến_xe');
            $table->integer('Chi_phí');
            $table->integer('Doanh_thu');
            $table->datetime('created__at');
            $table->datetime('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('thong_ke');
    }
}
