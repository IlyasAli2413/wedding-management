<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('venue', function (Blueprint $table) {
            $table->softDeletes(); // 👈 This adds the 'deleted_at' column
        });
    }

    public function down()
    {
        Schema::table('venue', function (Blueprint $table) {
            $table->dropSoftDeletes(); // 👈 This removes it on rollback
        });
    }
};
