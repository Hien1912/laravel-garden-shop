<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('name')->unique();
            $table->longText('avatar')->nullable();
            $table->longText('description')->nullable()->default(null);
            $table->unsignedInteger('price');
            $table->longText('details')->nullable()->default(null);
            $table->unsignedInteger('amount')->default(0);
            $table->string('category_id');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
