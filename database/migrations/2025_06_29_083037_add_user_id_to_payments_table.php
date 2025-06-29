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
        Schema::table('payment', function (Blueprint $table) {
            // ✅ Only add the column if it doesn't exist
            if (!Schema::hasColumn('payment', 'User_ID')) {
                $table->unsignedBigInteger('User_ID')->nullable()->after('Payment_ID');
            }
        });

        // Temporarily comment out the foreign key constraint to allow other migrations to run
        // Schema::table('payment', function (Blueprint $table) {
        //     try {
        //         $table->foreign('User_ID')
        //               ->references('id')
        //               ->on('users')
        //               ->onDelete('set null');
        //     } catch (\Exception $e) {
        //         // If foreign key already exists, ignore the error
        //     }
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment', function (Blueprint $table) {
            try {
                $table->dropForeign(['User_ID']);
            } catch (\Exception $e) {
                // If foreign key doesn't exist, ignore the error
            }
            
            if (Schema::hasColumn('payment', 'User_ID')) {
                $table->dropColumn('User_ID');
            }
        });
    }
};
