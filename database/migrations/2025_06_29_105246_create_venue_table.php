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
        Schema::create('venue', function (Blueprint $table) {
            $table->increments('Venue_ID'); // Custom auto-increment primary key
            $table->string('Name');
            $table->string('Location');
            $table->integer('Capacity');
            $table->timestamps(); // optional, for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue');
    }
};
