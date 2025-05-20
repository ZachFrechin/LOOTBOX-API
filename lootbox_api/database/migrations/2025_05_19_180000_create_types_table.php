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
            $table->string('CHALLENGE')->nullable();
            $table->string('GENERAL')->nullable();
            $table->string('HALF GOD')->nullable();
            $table->string('S RANKED')->nullable();
            $table->float('progress')->nullable();
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