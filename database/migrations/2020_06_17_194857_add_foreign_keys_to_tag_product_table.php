<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTagProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_product', function (Blueprint $table) {
            $table->foreign('tag_id', 'tag_product_fk1')->references('id')->on('tags');
            $table->foreign('product_id', 'tag_product_fk2')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tag_product', function (Blueprint $table) {
            $table->dropForeign('tag_product_fk1');
            $table->dropForeign('tag_product_fk2');
        });
    }
}
