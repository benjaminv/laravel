<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToTransactionTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_totals', function (Blueprint $table) {
            $table
                ->foreign('item_id')
                ->references('id')
                ->on('items');
            $table
                ->foreign('seller_id')
                ->references('id')
                ->on('sellers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_totals', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropForeign(['seller_id']);
        });
    }
}
