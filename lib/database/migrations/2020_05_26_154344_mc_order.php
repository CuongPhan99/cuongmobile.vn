<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class McOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mc_order', function (Blueprint $table) {
            $table->increments('or_id');
            $table->string('id');
            $table->string('or_name');
            $table->Integer('or_phone')->unsigned();
            $table->string('or_address');
            $table->boolean('or_status');
            $table->foreign('id') 
                  ->references('id')
                  ->on('mc_users');
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
        Schema::dropIfExists('mc_order');
    }
}
