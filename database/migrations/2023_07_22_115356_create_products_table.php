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
            $table->increments('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->float('price');
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->integer('view')->default(0);
            $table->string('slug')->nullable();
            $table->integer('cate_id');
            $table->integer('brand_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->softDeletes();
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
