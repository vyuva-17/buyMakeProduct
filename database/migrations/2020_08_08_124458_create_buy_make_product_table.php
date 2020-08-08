<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyMakeProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_make_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('buy_make');
            $table->string('grosswt');
            $table->string('pure');
            $table->string('pcs');
            $table->string('rate');
            $table->string('qs');
            $table->string('ms');
            $table->string('purewt');
            $table->string('netwt');
            $table->string('total');
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
        Schema::dropIfExists('buy_make_product');
    }
}
