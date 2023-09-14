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
            $table->string("name",50);
            $table->text("description");
            $table->smallInteger("rating");
            $table->decimal("original_price",5,2,true);
            $table->decimal("sale_price",5,2,true);
            $table->unsignedSmallInteger("quantity");
            $table->char("size");
            $table->string("color",50);
            $table->string("image",50);
            $table-> unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onupdate('cascade');
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
