<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company', 45)->nullable();
            $table->string('address', 45)->nullable();
            $table->string('address2', 45)->nullable();
            $table->string('image', 45)->nullable();
            $table->string('phone', 45)->nullable();
            $table->string('hotline', 45)->nullable();
            $table->string('tax', 45)->nullable();
            $table->string('facebook', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->string('introduce', 45)->nullable();
            $table->string('created_at', 45)->nullable();
            $table->string('updated_at', 45)->nullable();
            $table->string('summary', 45)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
