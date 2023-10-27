<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_birth')->nullable();
            $table->string('sex', 20)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('type_employee')->nullable()->comment('0 tài xế, 1 admin, 2 supper admin');
            $table->string('branch')->nullable();
            $table->string('license')->nullable();
            $table->string('phone')->nullable();
            $table->string('secret_code')->nullable();
            $table->rememberToken();
            $table->timestamps(6);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
