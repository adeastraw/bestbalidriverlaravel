<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_trip', function (Blueprint $table) {
            $table->foreignId('activity_id')->constrained()->cascadeOnDelete();
            $table->foreignId('trip_id')->constrained()->cascadeOnDelete();
            $table->primary(['activity_id', 'trip_id']);
        });

        Schema::create('trip_vehicle', function (Blueprint $table) {
            $table->foreignId('trip_id')->constrained()->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained()->cascadeOnDelete();
            $table->primary(['trip_id', 'vehicle_id']);
        });

        Schema::create('driver_trip', function (Blueprint $table) {
            $table->foreignId('driver_id')->constrained()->cascadeOnDelete();
            $table->foreignId('trip_id')->constrained()->cascadeOnDelete();
            $table->primary(['driver_id', 'trip_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('driver_trip');
        Schema::dropIfExists('trip_vehicle');
        Schema::dropIfExists('activity_trip');
    }
};
