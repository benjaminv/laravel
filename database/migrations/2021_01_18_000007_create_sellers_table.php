<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('sellerID')->unique();
            $table->integer('userScore')->nullable();
            $table->decimal('ratePerctg')->nullable();
            $table->integer('followers')->nullable();
            $table->smallInteger('reviews')->nullable();
            $table->string('memberSince')->nullable();
            $table->string('storeName')->nullable();
            $table->integer('positiveScore')->nullable();
            $table->integer('neutralScore')->nullable();
            $table->integer('negativeScore')->nullable();

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
        Schema::dropIfExists('sellers');
    }
}
