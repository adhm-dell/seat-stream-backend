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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('trailer');
            $table->integer('runnig_time');
            $table->text('story');
            $table->string('language');
            $table->string('poster');
            $table->date('release_date');
            $table->boolean('now_showing');
            $table->text('starring');
            $table->string('director');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
