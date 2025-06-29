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
            // First, drop the existing Order_ID column if it exists
            if (Schema::hasColumn('order', 'Order_ID')) {
                $table->dropColumn('Order_ID');
            }
            
            // Then add it back as an auto-increment primary key
            $table->id('Order_ID')->first();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            // Drop the auto-increment Order_ID
            $table->dropColumn('Order_ID');
            
            // Add back a regular integer column (non-auto-increment)
            $table->integer('Order_ID')->first();
        });
    }
};
