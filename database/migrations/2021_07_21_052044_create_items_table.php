<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('i_id');
            $table->string('i_code')->nullable();
            $table->string('i_name')->nullable(); 
            $table->integer('i_qty')->nullable();
            $table->string('i_img')->nullable();
            $table->unsignedBigInteger('pc_id')->nullable();
            $table->foreign('pc_id')->references('pc_id')->on('productcategories');          
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
        Schema::dropIfExists('items');
    }
}
