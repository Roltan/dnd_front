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
        Schema::create('draft_heroes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('hero_name')->nullable();
            $table->string('lvl')->nullable();
            $table->string('exp')->nullable();
            $table->string('klass')->nullable();
            $table->string('sub_klass')->nullable();
            $table->string('race')->nullable();
            $table->string('sub_race')->nullable();
            $table->string('background')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('draft_heroes');
    }
};
