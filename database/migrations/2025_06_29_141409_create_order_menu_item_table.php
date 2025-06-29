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
        Schema::create('order_menu_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Order_ID');
            $table->unsignedBigInteger('Menu_Item_ID');
            $table->foreign('Order_ID')->references('Order_ID')->on('order')->onDelete('cascade');
            $table->foreign('Menu_Item_ID')->references('Menu_Item_ID')->on('menu_item')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_menu_item');
    }
};
