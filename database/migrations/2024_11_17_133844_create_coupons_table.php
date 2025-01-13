<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('name')->unique(); // Tên mã giảm giá, duy nhất
            $table->enum('type', ['percentage', 'fixed']); // Loại: percentage (phần trăm) hoặc fixed (cố định)
            $table->double('value'); // Giá trị giảm giá
            $table->timestamp('expiration_date')->nullable(); // Ngày hết hạn
            $table->timestamps(); // Bao gồm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
