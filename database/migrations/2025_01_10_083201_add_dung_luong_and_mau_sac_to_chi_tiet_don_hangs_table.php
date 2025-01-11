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
        Schema::table('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->string('dung_luong')->after('so_luong'); 
            $table->string('mau_sac')->after('dung_luong');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chi_tiet_don_hangs', function (Blueprint $table) {
           
            $table->dropColumn(['dung_luong', 'mau_sac']);
        });
    }
};
