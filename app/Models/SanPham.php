<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_san_pham',
        'ten_san_pham',
        'slug',
        'hinh_anh',
        'gia_san_pham',
        'gia_khuyen_mai',
        'mo_ta_ngan',
        'noi_dung',
        'so_luong',
        'luot_xem',
        'ngay_dang_ban',
        'danh_muc_id',
        'hang_id',
        'trang_thai',
        'is_type',
        'is_new',
        'is_hot',
        'is_hot_deal',
        'is_show_home',
        'is_active',
    ];

    protected $casts = [
        'is_type' => 'boolean',
        'is_new' => 'boolean',
        'is_hot' => 'boolean',
        'is_hot_deal' => 'boolean',
        'is_show_home' => 'boolean',
        'is_active' => 'boolean',

    ];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class);
    }
    public function hinhAnhSanPham()
    {
        return $this->hasMany(HinhAnhSanPham::class);
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    // Quan hệ ngược lại với Hang
    public function hang()
    {
        return $this->belongsTo(Hang::class);
    }

    public function scopeScheduled($query)
    {
        return $query->where('trang_thai', 'da_len_lich')
        ->where('ngay_dang_ban', '<=', now());
    }
    // Liên kết với bình luận
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'san_pham_id');
    }
    public function carts()
    {
        return $this->hasMany(Cart::class, 'san_pham_id');
    }

    // quan hệ wishlist - yêu thích
    public function wishlists()
{
    return $this->hasMany(Wishlist::class, 'product_id');
}
}
