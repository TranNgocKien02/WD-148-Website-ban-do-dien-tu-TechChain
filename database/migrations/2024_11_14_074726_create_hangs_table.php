<?php

use App\Models\DanhMuc;
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
        Schema::create('hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_hang');
            $table->text('mo_ta')->nullable();
            $table->foreignIdFor(DanhMuc::class)->constrained();
            $table->foreignIdFor(SanPham::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hangs');
    }
};
