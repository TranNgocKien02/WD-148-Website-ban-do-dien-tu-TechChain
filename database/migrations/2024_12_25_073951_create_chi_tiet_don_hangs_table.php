<?php

use App\Models\DonHang;
use App\Models\ProductVariant;
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
        Schema::create('chi_tiet_don_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DonHang::class)->constrained();
            $table->foreignIdFor(ProductVariant::class)->constrained('bien_the_san_pham');
            $table->string('ten_san_pham');
            $table->string('ma_san_pham');
            $table->string('anh_san_pham');
            $table->double('don_gia');
            $table->string('gia_khuyen_mai');
            $table->string('dung_luong');
            $table->string('mau_sac');
            $table->unsignedInteger('so_luong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_don_hangs');
    }
};

