<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
      Schema::create('staffmember', function (Blueprint $table) {
    $table->increments('Staffmember_ID'); // ✅ auto-incrementing primary key
    $table->string('Name');
    $table->string('Address');
    $table->integer('Salary');
});

    }

    public function down(): void
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropForeign(['User_ID']);
            $table->dropColumn('User_ID');
        });
    }
};
