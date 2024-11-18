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
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khuyen_mai');
            $table->text('mo_ta')->nullable();
            $table->enum('loai_khuyen_mai', ['phan_tram', 'gia_tri']);
            $table->decimal('gia_tri_khuyen_mai', 8, 2);
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->boolean('trang_thai')->default(1);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyen_mais');
    }
};
