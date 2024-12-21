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
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->decimal('tien_khuyen_mai', 10, 2)->default(0)->after('tien_hang'); // Thêm trường tien_khuyen_mai

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->dropColumn('tien_khuyen_mai'); // Xóa trường tien_khuyen_mai nếu rollback

        });
    }
};
