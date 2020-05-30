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
            $table->string('or_email');
            $table->string('or_name');
            $table->Integer('or_phone')->unsigned();
            $table->string('or_address');
            $table->boolean('or_status');
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
