<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongTinTrangWeb extends Model
{
    use HasFactory;
    protected $fillable = [
        'tieu_de',
        'mo_ta',
        'so_dien_thoai',
        'email_ho_tro',
        'dia_chi',
    ];
}
