<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('min');
            $table->float('max');
            $table->string('unity');
            $table->string('challenge')->nullable();
            $table->string('general')->nullable();
            $table->string('half_god')->nullable();
            $table->string('s_ranked')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('types');
    }
}; 