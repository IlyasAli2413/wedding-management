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
        // Drop the existing payment table and recreate it with proper structure
        Schema::dropIfExists('payment');
        
        Schema::create('payment', function (Blueprint $table) {
            $table->id('Payment_ID'); // This creates an auto-increment primary key
            $table->unsignedInteger('Order_ID'); // Match the data type with order table
            $table->date('Payment_Date');
            $table->decimal('Amount', 10, 2);
            $table->string('Method', 50);
            $table->string('Status', 50)->default('Pending');
            $table->unsignedBigInteger('User_ID');
            $table->timestamps();
            
            // Add foreign key constraints
            $table->foreign('Order_ID')->references('Order_ID')->on('order')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
