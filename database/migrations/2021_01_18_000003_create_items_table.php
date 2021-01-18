<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id')->unique();
            $table->string('itemID')->unique();
            $table->string('item_name');
            $table->string('seller_id');
            $table->integer('user_score')->nullable();
            $table->string('condition')->nullable();
            $table->string('brand')->nullable();
            $table->string('upc')->nullable();
            $table->string('ean')->nullable();
            $table->string('ePID')->nullable();
            $table->integer('sold')->nullable();
            $table->smallInteger('d_view')->nullable();
            $table->integer('item_rate_count')->nullable();
            $table->tinyInteger('item_rate')->nullable();
            $table->double('item_price')->nullable();
            $table->double('item_list_price')->nullable();
            $table->double('item_postage')->nullable();
            $table->tinyInteger('item_hotness')->nullable();
            $table->smallInteger('item_sold')->nullable();
            $table->smallInteger('item_watching')->nullable();

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
        Schema::dropIfExists('items');
    }
}
