<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            
            $table->bigIncrements('oi_id');
            $table->unsignedBigInteger('o_id');
            $table->unsignedBigInteger('i_id');
            $table->foreign('o_id')->references('o_id')->on('orders')->onDelete('cascade');
            $table->foreign('i_id')->references('i_id')->on('items')->onDelete('cascade');
            $table->string('price');
            $table->integer('quantity');

            $table->timestamps();
            $table->softDeletes();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
