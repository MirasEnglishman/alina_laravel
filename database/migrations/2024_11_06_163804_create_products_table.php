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
            $table->string('name', 255);
            $table->text('content')->nullable();
            $table->string('image', 255)->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->tinyInteger('published')->default(1);
            $table->unsignedInteger('stock')->default(0);
            $table->string('sku', 255)->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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

