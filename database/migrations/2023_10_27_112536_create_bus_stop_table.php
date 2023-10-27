<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusStopTable extends Migration
{
    public function up()
    {
        Schema::create('bus_stop', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('điểm dừng');
            $table->string('name', 255)->charset('utf8')->collation('utf8_general_ci')->nullable();
            $table->string('position', 255)->charset('utf8')->collation('utf8_general_ci')->nullable();
            $table->string('user_create', 55)->charset('utf8')->collation('utf8_general_ci')->nullable();
            $table->string('user_update', 55)->charset('utf8')->collation('utf8_general_ci')->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
            $table->index('user_create');
            $table->index('user_update');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bus_stop');
    }
}

