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
            $table->unsignedBiginteger('regions_id')->unsigned();
            $table->unsignedBiginteger('stores_id')->unsigned();

            $table->foreign('regions_id')->references('id')
                 ->on('regions')->onDelete('cascade');
            $table->foreign('stores_id')->references('id')
                ->on('stores')->onDelete('cascade');

            $table->timestamps();
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
