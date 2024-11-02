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
        Schema::create('food_drinks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained('food_category')->onDelete('cascade');
            $table->string('name');
            $table->integer('price');
            $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_drinks');
    }
};
