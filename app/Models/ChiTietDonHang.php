<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'don_hang_id',
        'product_variant_id',
        'ten_san_pham',
        'ma_san_pham',
        'anh_san_pham',
        'don_gia',
        'gia_khuyen_mai',
        'dung_luong',
        'mau_sac',
        'so_luong',
    ];

    public function donHang(){
        return $this->belongsTo(DonHang::class) ;
    }
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
