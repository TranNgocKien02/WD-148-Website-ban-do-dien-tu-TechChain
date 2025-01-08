<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    
    // protected $table = 'danh_mucs' ;

    protected $fillable = [
        'hinh_anh',
        'ten_danh_muc',
        'trang_thai'
    ];

    protected $casts = [
        'trang_thai' => 'boolean'

    ];

    public function sanPhams(){
        return $this->hasMany(SanPham::class) ;
    }


    // Quan hệ một-nhiều với Hang
    public function hangs()
    {
        return $this->hasMany(Hang::class);
    }
}
