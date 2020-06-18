<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orderdetails', function (Blueprint $table) {
            $table->unsignedInteger('order_number')->index('order_number');
            $table->unsignedInteger('product_id')->index('product_id');
            $table->integer('quantity');
            $table->Integer('price');
            $table->primary(['order_number','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
