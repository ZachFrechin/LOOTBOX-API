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

        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('probability', 5, 2);
            $table->timestamps();
        });

        Schema::create('loot_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id')->constrained('ranks');
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranks');
    }
};
