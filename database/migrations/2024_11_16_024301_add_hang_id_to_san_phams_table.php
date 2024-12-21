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
    Schema::table('san_phams', function (Blueprint $table) {
        // Kiểm tra xem cột hang_id đã tồn tại chưa
        if (!Schema::hasColumn('san_phams', 'hang_id')) {
            $table->unsignedBigInteger('hang_id')->nullable(); // Thêm cột khóa ngoại
            $table->foreign('hang_id')->references('id')->on('hangs')->onDelete('cascade');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_phams', function (Blueprint $table) {
            $table->dropForeign(['hang_id']); // Xóa ràng buộc khóa ngoại
            $table->dropColumn('hang_id');  
        });
    }
};
