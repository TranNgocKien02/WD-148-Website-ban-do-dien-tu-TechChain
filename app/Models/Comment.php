<?php

namespace App\Models;

use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\client\ProductController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'hinh_anh',
        'content',
    ];

    /**
     * Định nghĩa mối quan hệ với model Product.
     * Mỗi comment thuộc về một sản phẩm.
     */
    public function product()
    {
        return $this->belongsTo(SanPhamController::class, 'ma_san_pham', 'ma_san_pham');
    }

    /**
     * Scope để lọc các bình luận đã được chấp nhận.
     */
    public function scopeAccepted($query)
    {
        return $query->where('chấp nhận', true);
    }

    /**
     * Scope để lọc các bình luận chưa được chấp nhận.
     */
    public function scopePending($query)
    {
        return $query->where('chapnhan', false);
    }

    /**
     * Accessor để lấy trạng thái chấp nhận của comment dưới dạng chuỗi.
     * Sẽ trả về "Chấp nhận" hoặc "Chưa chấp nhận".
     */
    public function getStatusAttribute()
    {
        return $this->chapnhan ? 'chapnhan' : 'chuachapnhan';
    }

    /**
     * Mutator để tự động viết hoa tên sản phẩm khi lưu vào database.
     */
    public function setTenSanPhamAttribute($value)
    {
        $this->attributes['ten_san_pham'] = ucfirst($value);
    }

   
}
