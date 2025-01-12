<?php

use App\Models\SanPham;
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
        Schema::create('bien_the_san_pham', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SanPham::class)->constrained();
            $table->string('dung_luong')->nullable();
            $table->string('mau_sac')->nullable();
            $table->string('anh')->nullable();
            $table->integer('so_luong')->default(0);
            $table->float('gia')->nullable();
            $table->timestamps();
            $table->unique(['san_pham_id', 'dung_luong', 'mau_sac'], 'product_variant_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bien_the_san_pham');
    }
};
