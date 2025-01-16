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
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->string('type_name');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('products_name');
            $table->foreignId('product_type_id')
                  ->references('id')
                  ->on('product_types')
                  ->constrained();
            $table->text('description');
            $table->text('stock');
            $table->text('price');
            $table->text('img_url');
            $table->text('img_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
        Schema::dropIfExists('products');
    }
};
