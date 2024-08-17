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
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('price');
            $table->integer('discount_type')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('after_discount');
            $table->longText('tags')->nullable();
            $table->longText('short_desp')->nullable();
            $table->longText('long_desp')->nullable();
            $table->longText('addi_info')->nullable();
            $table->string('preview');
            $table->string('slug')->nullable();
            $table->integer('status')->nullable();
            $table->string('store_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_models');
    }
};
