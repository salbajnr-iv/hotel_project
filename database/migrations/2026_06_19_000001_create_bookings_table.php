<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->date('arrival');
            $table->date('departure');

            $table->string('full_name', 255);
            $table->string('email', 255);
            $table->string('phone', 50);
            $table->string('notes', 1000)->nullable();

            $table->string('status', 50)->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

