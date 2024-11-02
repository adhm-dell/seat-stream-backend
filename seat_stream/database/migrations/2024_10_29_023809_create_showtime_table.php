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
        Schema::create('showtime', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');
            $table->foreignId('theater_id')->constrained('theater')->onDelete('cascade');
            $table->time('time');
            $table->date('day');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtime');
    }
};
