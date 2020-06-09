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
            $table->id();
            $table->string('name')->unique();
            $table->longText('avatar');
            $table->text('description')->nullable()->default(null);
            $table->integer('price');
            $table->longText('details')->nullable()->default(null);
            $table->Integer('amount')->default(0);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tag_product', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');
            $table->primary(['product_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_product');
        Schema::dropIfExists('products');
    }
}
