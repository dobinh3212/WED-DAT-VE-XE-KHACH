<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvinceTable extends Migration
{
    public function up()
    {
        Schema::create('province', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->timestamps(0); // This creates created_at and updated_at as datetime columns.
        });
    }

    public function down()
    {
        Schema::dropIfExists('province');
    }
}
