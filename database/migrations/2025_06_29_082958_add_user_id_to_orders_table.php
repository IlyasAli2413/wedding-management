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
            // Add the column first
            if (!Schema::hasColumn('order', 'User_ID')) {
                $table->unsignedBigInteger('User_ID')->nullable()->after('Order_ID');
            }

            // Then add the foreign key constraint
            $table->foreign('User_ID')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['User_ID']);
            if (Schema::hasColumn('order', 'User_ID')) {
                $table->dropColumn('User_ID');
            }
        });
    }
};
