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
        Schema::table('san_phams', function (Blueprint $table) {
            $table->unsignedBigInteger('hang_id')->nullable(); // Khóa ngoại trỏ đến bảng hangs
            $table->foreign('hang_id')->references('id')->on('hangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_phams', function (Blueprint $table) {
            //
        });
    }
};
