<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;

    // Chỉ định tên bảng nếu tên bảng khác với quy ước của Laravel
    protected $table = 'khuyen_mais';

    // Các thuộc tính có thể gán hàng loạt
    protected $fillable = [
        'ten_khuyen_mai',
        'mo_ta',
        'loai_khuyen_mai',
        'gia_tri_khuyen_mai',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
    ];

    // Định nghĩa các kiểu dữ liệu cho các trường trong bảng
    protected $casts = [
        'ngay_bat_dau' => 'date',
        'ngay_ket_thuc' => 'date',
        'trang_thai' => 'boolean',
    ];

    /**
     * Phương thức để kiểm tra khuyến mãi còn hiệu lực
     */
    public function isValid()
    {
        $now = now();
        return $this->trang_thai && $now->between($this->ngay_bat_dau, $this->ngay_ket_thuc);
    }
}
