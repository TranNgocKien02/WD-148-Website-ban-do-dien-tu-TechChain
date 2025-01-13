<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $table = 'bien_the_san_pham';

    protected $fillable = [
        'san_pham_id',
        'anh',
        'dung_luong',
        'mau_sac',
        'so_luong',
        'gia'
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class);
    }

}
