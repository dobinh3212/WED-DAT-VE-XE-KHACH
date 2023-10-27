<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTicketTable extends Migration
{
    public function up()
    {
        Schema::create('order_ticket', function (Blueprint $table) {
            $table->id();
            $table->integer('user_edit_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('buse_id')->nullable();
            $table->integer('number')->nullable();
            $table->integer('is_active')->default(0)->comment('0 chưa thanh toán,1 đã thanh toán');
            $table->string('total', 45)->nullable();
            $table->string('payment', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_ticket');
    }
}
