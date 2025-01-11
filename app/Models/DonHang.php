<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    const TRANG_THAI_DON_HANG = [
        'cho_xac_nhan' => 'Chờ xác nhận',
        'da_xac_nhan' => 'Đã xác nhận',
        'dang_chuan_bi' => 'Đang chuẩn bị',
        'dang_van_chuyen' => 'Đang vận chuyển',
        'da_giao_hang' => 'Đã giao hànng',
        'huy_don_hang' => 'Đơn hàng đã hủy',
    ];
    const TRANG_THAI_THANH_TOAN = [
        'chua_thanh_toan' => 'Chưa thanh toán',
        'da_thanh_toan' => 'Đã thanh toán',
    ];

    const PHUONG_THUC_THANH_TOAN = [
        'COD' => 'Thanh toán khi nhận hàng',
        'momo' => 'Momo'
    ];

    const COD = 'COD';
    const MOMO  = 'momo';


    const CHO_XAC_NHAN = 'cho_xac_nhan';
    const DA_XAC_NHAN  = 'da_xac_nhan';
    const DANG_CHUAN_BI = 'dang_chuan_bi';
    const DANG_VAN_CHUYEN = 'dang_van_chuyen';
    const DA_GIAO_HANG = 'da_giao_hang';
    const HUY_DON_HANG = 'huy_don_hang';
    const CHUA_THANH_TOAN = 'chua_thanh_toan';
    const DA_THANH_TOAN = 'da_thanh_toan';
    // Các trạng thái thanh toán


    protected $fillable = [
        'ma_don_hang',
        'user_id',
        'ten_nguoi_nhan',
        'email_nguoi_nhan',
        'so_dien_thoai_nguoi_nhan',
        'dia_chi_nguoi_nhan',
        'ghi_chu',
        'trang_thai_don_hang',
        'trang_thai_thanh_toan',
        'phuong_thuc_thanh_toan',
        'tien_hang',
        'tien_khuyen_mai',
        'tien_ship',
        'tong_tien',

    ];

    // Thêm sự kiện Eloquent để tự động tạo ma_don_hang
    //   protected static function booted()
    //   {
    //       static::creating(function ($donHang) {
    //           // Lấy số lượng đơn hàng hiện tại
    //           $latestOrder = self::latest('id')->first();
    //           $nextId = $latestOrder ? $latestOrder->id + 1 : 1;

    //           // Tạo mã đơn hàng mới
    //           $donHang->ma_don_hang = sprintf('DH%03d', $nextId);
    //       });
    //   }
    protected $dates = ['ngay_dat', 'deleted_at'];


    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    protected $casts = [
        'ngay_dat' => 'datetime',
    ];
}
