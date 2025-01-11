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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SanPham::class)->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng san_pham
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade'); // Khóa ngoại đến bảng users
            $table->integer('so_luong'); // Số lượng sản phẩm
            $table->string('mau_sac'); // Thêm màu sắc
            $table->string('dung_luong'); // Thêm dung lượng/kích thước
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
