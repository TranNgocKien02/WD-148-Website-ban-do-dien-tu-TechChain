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
        Schema::table('hangs', function (Blueprint $table) {
            // Xóa khóa ngoại
            $table->dropForeign(['san_pham_id']);
            
            // Xóa cột san_pham_id
            $table->dropColumn('san_pham_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hangs', function (Blueprint $table) {
            // Phục hồi lại khóa ngoại và cột san_pham_id nếu rollback
            $table->unsignedBigInteger('san_pham_id')->nullable();
            $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade');
        });
    }
};
