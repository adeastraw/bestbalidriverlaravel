<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->nullable(); // e.g. Day Tour, Cultural, Adventure, Sunset
            $table->string('location')->nullable(); // e.g. Ubud & Central Bali, East Bali, Nusa Penida
            $table->string('duration')->nullable(); // e.g. 10 Hours, Full Day, Half Day
            $table->decimal('price', 12, 2)->nullable();
            $table->string('price_label')->nullable(); // e.g. "per car", "up to 5 persons", "Contact Us"
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('hero_image')->nullable();
            $table->boolean('status')->default(true)->index();
            $table->boolean('featured')->default(false)->index();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
