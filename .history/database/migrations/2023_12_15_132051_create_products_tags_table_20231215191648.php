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
        Schema::create('products_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id')->unsigned();
            $table->unsignedBigInteger('tags_id')->unsigned();
            $table->timestamps();

            $table->foreign('products_id')->references('products')->on('id')->onDelete('cascade');
            $table->foreign('tags_id')->references('products')->on('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_tags');
    }
};
