<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loot_boxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->morphs('typeable');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loot_boxes');
    }
}; 