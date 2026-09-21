<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->nullable(); // e.g. MPV, SUV, Minibus
            $table->integer('capacity')->default(4); // Passenger seats
            $table->integer('luggage_capacity')->nullable();
            $table->text('description')->nullable();
            $table->text('facilities')->nullable(); // JSON or newline-separated features
            $table->string('photo')->nullable();
            $table->boolean('status')->default(true)->index();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
