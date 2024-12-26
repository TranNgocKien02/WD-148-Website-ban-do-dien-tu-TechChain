<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_hang',
        'mo_ta',
        'danh_muc_id',
    ];

    // Quan hệ ngược lại với DanhMuc
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }
    // Quan hệ một-nhiều với SanPham
    public function sanPhams()
    {
        return $this->hasMany(SanPham::class);
    }
}
