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
            // ✅ Add Payment_ID as an auto-increment primary key if it doesn't exist
            if (!Schema::hasColumn('payment', 'Payment_ID')) {
                $table->id('Payment_ID')->first(); // Add as first column
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payment', function (Blueprint $table) {
            // ❌ Drop column only if it was added above (optional)
            $table->dropColumn('Payment_ID');
        });
    }
};
