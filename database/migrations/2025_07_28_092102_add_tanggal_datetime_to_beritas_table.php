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
    Schema::table('beritas', function (Blueprint $table) {
        if (!Schema::hasColumn('beritas', 'tanggal')) {
            $table->dateTime('tanggal')->nullable()->after('teks');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('beritas', function (Blueprint $table) {
        if (Schema::hasColumn('beritas', 'tanggal')) {
            $table->dropColumn('tanggal');
        }
    });
}
};
