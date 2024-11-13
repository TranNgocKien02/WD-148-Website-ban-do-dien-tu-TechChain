<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'tieu_de',
        'mo_ta',
        'anh',
        'link',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
