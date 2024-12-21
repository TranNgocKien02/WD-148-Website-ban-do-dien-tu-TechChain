<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HangModel extends Model
{
    use HasFactory;

    protected $table = 'hangs'; // Tên bảng trong database

    protected $fillable = [
        'ten_hang',
        'mo_ta',
        'danh_muc_id',
        'san_pham_id',
    ];

    // Quan hệ ngược lại với DanhMuc
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danh_muc_id', 'id');
    }
    // Quan hệ một-nhiều với SanPham
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'hang_id');
    }
}
