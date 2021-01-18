<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToItemsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items_categories', function (Blueprint $table) {
            $table
                ->foreign('item_id')
                ->references('itemID')
                ->on('items');
            $table
                ->foreign('nid')
                ->references('NId')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items_categories', function (Blueprint $table) {
            $table->dropForeign(['item_id']);
            $table->dropForeign(['nid']);
        });
    }
}
