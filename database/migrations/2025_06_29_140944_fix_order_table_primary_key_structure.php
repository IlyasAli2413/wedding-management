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
        // Drop the existing order table and recreate it with proper structure
        Schema::dropIfExists('order');
        
        Schema::create('order', function (Blueprint $table) {
            $table->id('Order_ID'); // This creates an auto-increment primary key
            $table->integer('Client_ID'); // Match the client table data type
            $table->string('Wedding_Type')->nullable();
            $table->date('Order_Date');
            $table->string('Status', 50);
            $table->unsignedBigInteger('User_ID');
            $table->timestamps();
            
            // Add foreign key constraints
            $table->foreign('Client_ID')->references('Client_ID')->on('client')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
