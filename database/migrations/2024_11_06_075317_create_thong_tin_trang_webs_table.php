<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('thong_tin_trang_webs', function (Blueprint $table) {
        $table->id();
        $table->string('tieu_de')->nullable();
        $table->text('mo_ta')->nullable();
        $table->string('so_dien_thoai')->nullable();
        $table->string('email_ho_tro')->nullable();
        $table->string('dia_chi')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thong_tin_trang_webs');
    }
};
