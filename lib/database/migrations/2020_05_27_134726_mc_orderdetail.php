<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class McOrderdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_orderdetail', function (Blueprint $table) {
            $table->integer('od_id')->unsigned();
            $table->integer('prod_id')->unsigned();
            $table->string('od_quantity');
            $table->integer('od_price');
            $table->foreign('prod_id') 
                  ->references('prod_id')
                  ->on('mc_products');
            $table->foreign('od_id') 
                  ->references('or_id')
                  ->on('mc_order')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mc_orderdetail');
    }
}
