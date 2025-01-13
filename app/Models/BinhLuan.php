<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binh_luan';

    protected $fillable = [
        'san_pham_id',
        'user_id',
        'noi_dung',
        'sao',
    ];

    // Liên kết với sản phẩm
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }

    // Liên kết với người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
