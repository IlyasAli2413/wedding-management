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
        // First, drop any foreign key constraints that reference the order table
        Schema::table('payment', function (Blueprint $table) {
            try {
                $table->dropForeign(['Order_ID']);
            } catch (\Exception $e) {
                // Foreign key doesn't exist, ignore
            }
        });
        
        // Drop the existing order table
        Schema::dropIfExists('order');
        
        // Create the order table with correct structure
        Schema::create('order', function (Blueprint $table) {
            $table->id('Order_ID'); // This creates BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->unsignedBigInteger('Client_ID');
            $table->unsignedBigInteger('Wedding_ID');
            $table->date('Order_Date');
            $table->string('Status');
            $table->unsignedBigInteger('User_ID')->nullable();
            
            // Add foreign key constraints
            $table->foreign('Client_ID')->references('Client_ID')->on('client')->onDelete('cascade');
            $table->foreign('Wedding_ID')->references('Wedding_ID')->on('wedding')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onDelete('set null');
            
            // Add indexes for better performance
            $table->index(['Client_ID', 'Wedding_ID']);
            $table->index('User_ID');
        });
        
        // Re-add the foreign key constraint to payment table
        Schema::table('payment', function (Blueprint $table) {
            $table->foreign('Order_ID')->references('Order_ID')->on('order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop foreign key constraints first
        Schema::table('payment', function (Blueprint $table) {
            try {
                $table->dropForeign(['Order_ID']);
            } catch (\Exception $e) {
                // Foreign key doesn't exist, ignore
            }
        });
        
        Schema::dropIfExists('order');
    }
};
