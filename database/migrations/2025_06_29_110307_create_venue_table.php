<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('venue', function (Blueprint $table) {
            $table->id('Venue_ID');
            $table->string('Name');
            $table->string('Location');
            $table->integer('Capacity');
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venue');
    }
};

