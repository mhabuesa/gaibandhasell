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
        Schema::create('store_models', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('store_name');
            $table->string('vendor_id');
            $table->longText('address');
            $table->string('phone');
            $table->string('email');
            $table->longText('facebook')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_models');
    }
};
