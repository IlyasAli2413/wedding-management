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
        Schema::table('order', function (Blueprint $table) {
            // Only add the foreign key if the column already exists
            if (!\Schema::hasColumn('order', 'Venue_ID')) {
                $table->integer('Venue_ID')->nullable()->after('Client_ID');
            }
            $table->foreign('Venue_ID')->references('Venue_ID')->on('venue')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['Venue_ID']);
            $table->dropColumn('Venue_ID');
        });
    }
};
