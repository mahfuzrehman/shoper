<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcat_id');
            $table->integer('brand_id');
            $table->integer('unit_id');
            $table->string('product_name');
            $table->float('regular_price',10,2);
            $table->float('selling_price',10,2);
            $table->integer('product_quantity');
            $table->text('product_long_desc');
            $table->text('product_short_desc');
            $table->string('product_image');
            $table->string('product_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
