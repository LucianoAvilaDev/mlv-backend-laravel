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
        Schema::create('item_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->integer('provider_product_id');
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->string('image');
            $table->string('material');
            $table->string('department');
            $table->decimal('price', 10, 2);
            $table->decimal('quantity', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('provider');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_products');
    }
};
