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
        // Drop existing tables if they exist
        Schema::dropIfExists('wedding_venue_mapping');
        Schema::dropIfExists('weddingplanner');
        Schema::dropIfExists('weddingserver');
        Schema::dropIfExists('weddingchef');
        Schema::dropIfExists('wedding_staff_assignment');
        Schema::dropIfExists('menu_inventorymapping');
        Schema::dropIfExists('wedding_event');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('order');
        Schema::dropIfExists('guest');
        Schema::dropIfExists('wedding');
        Schema::dropIfExists('wedding_menu_item');
        Schema::dropIfExists('inventory_item');
        Schema::dropIfExists('staffmember');
        Schema::dropIfExists('client');
        Schema::dropIfExists('venue');

        // Create VENUE table
        Schema::create('venue', function (Blueprint $table) {
            $table->id('Venue_ID');
            $table->string('Name', 100);
            $table->string('Location', 100);
            $table->integer('Capacity');
            $table->timestamps();
        });

        // Create CLIENT table
        Schema::create('client', function (Blueprint $table) {
            $table->id('Client_ID');
            $table->string('Name', 100);
            $table->text('Address');
            $table->string('Contact', 100);
            $table->timestamps();
        });

        // Create WEDDING table
        Schema::create('wedding', function (Blueprint $table) {
            $table->id('Wedding_ID');
            $table->unsignedBigInteger('Venue_ID');
            $table->string('Event_Type', 100);
            $table->date('Date');
            $table->string('Client_Contact', 100);
            $table->timestamps();
            
            $table->foreign('Venue_ID')->references('Venue_ID')->on('venue')->onDelete('cascade');
        });

        // Create GUEST table
        Schema::create('guest', function (Blueprint $table) {
            $table->id('Guest_ID');
            $table->unsignedBigInteger('Wedding_ID');
            $table->string('Name', 100);
            $table->string('Contact', 100);
            $table->text('Address');
            $table->timestamps();
            
            $table->foreign('Wedding_ID')->references('Wedding_ID')->on('wedding')->onDelete('cascade');
        });

        // Create ORDER table
        Schema::create('order', function (Blueprint $table) {
            $table->id('Order_ID');
            $table->unsignedBigInteger('Client_ID');
            $table->unsignedBigInteger('Wedding_ID');
            $table->date('Order_Date');
            $table->string('Status', 50);
            $table->unsignedBigInteger('User_ID'); // For user authentication
            $table->timestamps();
            
            $table->foreign('Client_ID')->references('Client_ID')->on('client')->onDelete('cascade');
            $table->foreign('Wedding_ID')->references('Wedding_ID')->on('wedding')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onDelete('cascade');
        });

        // Create PAYMENT table
        Schema::create('payment', function (Blueprint $table) {
            $table->id('Payment_ID');
            $table->unsignedBigInteger('Order_ID');
            $table->date('Payment_Date');
            $table->decimal('Amount', 10, 2);
            $table->string('Method', 50);
            $table->string('Status', 50)->default('Pending');
            $table->unsignedBigInteger('User_ID'); // For user authentication
            $table->timestamps();
            
            $table->foreign('Order_ID')->references('Order_ID')->on('order')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onDelete('cascade');
        });

        // Create WEDDING_MENU_ITEM table
        Schema::create('wedding_menu_item', function (Blueprint $table) {
            $table->id('MenuItem_ID');
            $table->string('Name', 100);
            $table->text('Details');
            $table->decimal('Price', 10, 2);
            $table->timestamps();
        });

        // Create WEDDING_EVENT table (pivot table for order and menu items)
        Schema::create('wedding_event', function (Blueprint $table) {
            $table->unsignedBigInteger('Order_ID');
            $table->unsignedBigInteger('MenuItem_ID');
            $table->integer('Quantity');
            $table->text('Special_Notes')->nullable();
            $table->timestamps();
            
            $table->primary(['Order_ID', 'MenuItem_ID']);
            $table->foreign('Order_ID')->references('Order_ID')->on('order')->onDelete('cascade');
            $table->foreign('MenuItem_ID')->references('MenuItem_ID')->on('wedding_menu_item')->onDelete('cascade');
        });

        // Create INVENTORY_ITEM table
        Schema::create('inventory_item', function (Blueprint $table) {
            $table->id('Inventory_ID');
            $table->string('Name', 100);
            $table->string('Unit', 50);
            $table->boolean('Availability')->default(true);
            $table->timestamps();
        });

        // Create MENU_INVENTORYMAPPING table
        Schema::create('menu_inventorymapping', function (Blueprint $table) {
            $table->id('Menu_inventorymapping_ID');
            $table->unsignedBigInteger('MenuItem_ID');
            $table->unsignedBigInteger('Inventory_ID');
            $table->integer('Quantity_Required');
            $table->timestamps();
            
            $table->foreign('MenuItem_ID')->references('MenuItem_ID')->on('wedding_menu_item')->onDelete('cascade');
            $table->foreign('Inventory_ID')->references('Inventory_ID')->on('inventory_item')->onDelete('cascade');
        });

        // Create STAFFMEMBER table
        Schema::create('staffmember', function (Blueprint $table) {
            $table->id('Staffmember_ID');
            $table->string('Name', 100);
            $table->text('Address');
            $table->decimal('Salary', 10, 2);
            $table->timestamps();
        });

        // Create WEDDING_STAFF_ASSIGNMENT table
        Schema::create('wedding_staff_assignment', function (Blueprint $table) {
            $table->unsignedBigInteger('Wedding_ID');
            $table->unsignedBigInteger('Staffmember_ID');
            $table->string('Role', 100);
            $table->string('Shift_Time', 50);
            $table->timestamps();
            
            $table->primary(['Wedding_ID', 'Staffmember_ID']);
            $table->foreign('Wedding_ID')->references('Wedding_ID')->on('wedding')->onDelete('cascade');
            $table->foreign('Staffmember_ID')->references('Staffmember_ID')->on('staffmember')->onDelete('cascade');
        });

        // Create WEDDINGCHEF table
        Schema::create('weddingchef', function (Blueprint $table) {
            $table->unsignedBigInteger('Staffmember_ID')->primary();
            $table->string('Speciality', 100);
            $table->timestamps();
            
            $table->foreign('Staffmember_ID')->references('Staffmember_ID')->on('staffmember')->onDelete('cascade');
        });

        // Create WEDDINGSERVER table
        Schema::create('weddingserver', function (Blueprint $table) {
            $table->unsignedBigInteger('Staffmember_ID')->primary();
            $table->string('Assigned_Section', 100);
            $table->timestamps();
            
            $table->foreign('Staffmember_ID')->references('Staffmember_ID')->on('staffmember')->onDelete('cascade');
        });

        // Create WEDDINGPLANNER table
        Schema::create('weddingplanner', function (Blueprint $table) {
            $table->unsignedBigInteger('Staffmember_ID')->primary();
            $table->integer('Managed_Events_Count');
            $table->timestamps();
            
            $table->foreign('Staffmember_ID')->references('Staffmember_ID')->on('staffmember')->onDelete('cascade');
        });

        // Create Wedding_Venue_Mapping table
        Schema::create('wedding_venue_mapping', function (Blueprint $table) {
            $table->unsignedBigInteger('wedding_id');
            $table->unsignedBigInteger('venue_id');
            $table->timestamps();
            
            $table->primary(['wedding_id', 'venue_id']);
            $table->foreign('wedding_id')->references('Wedding_ID')->on('wedding')->onDelete('cascade');
            $table->foreign('venue_id')->references('Venue_ID')->on('venue')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_venue_mapping');
        Schema::dropIfExists('weddingplanner');
        Schema::dropIfExists('weddingserver');
        Schema::dropIfExists('weddingchef');
        Schema::dropIfExists('wedding_staff_assignment');
        Schema::dropIfExists('menu_inventorymapping');
        Schema::dropIfExists('wedding_event');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('order');
        Schema::dropIfExists('guest');
        Schema::dropIfExists('wedding');
        Schema::dropIfExists('wedding_menu_item');
        Schema::dropIfExists('inventory_item');
        Schema::dropIfExists('staffmember');
        Schema::dropIfExists('client');
        Schema::dropIfExists('venue');
    }
};
