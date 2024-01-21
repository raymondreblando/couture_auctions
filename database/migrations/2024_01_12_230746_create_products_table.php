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
            $table->ulid('product_id')
                ->primary();
            $table->string('product_name')
                ->unique();
            $table->foreignUlid('category_id')
                ->constrained('categories', 'category_id')
                ->cascadeOnDelete();
            $table->foreignUlid('subcategory_id')
                ->constrained('sub_categories', 'subcategory_id')
                ->cascadeOnDelete();
            $table->decimal('starting_price');
            $table->dateTime('bid_end_date');
            $table->string('product_description', 1000);
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
