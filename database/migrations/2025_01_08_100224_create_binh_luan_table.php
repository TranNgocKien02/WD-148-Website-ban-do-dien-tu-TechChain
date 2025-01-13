<?php

use App\Models\User;
use App\Models\SanPham;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('binh_luan', function (Blueprint $table) {
            $table->id(); // ID tự tăng
            $table->foreignIdFor(SanPham::class)->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng san_pham
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng users
            $table->text('noi_dung'); // Nội dung bình luận
            $table->integer('sao')->default(0); // Đánh giá sao (0-5)
            $table->timestamps(); // Tự động thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luan');
    }
};
