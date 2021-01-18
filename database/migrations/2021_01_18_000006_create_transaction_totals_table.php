<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_totals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_id')->unique();
            $table->string('seller_id');
            $table->integer('item_sold');
            $table->timestamp('last_trans');

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
        Schema::dropIfExists('transaction_totals');
    }
}
