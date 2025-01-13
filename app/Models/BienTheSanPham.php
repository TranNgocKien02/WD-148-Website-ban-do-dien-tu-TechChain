<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BienTheSanPham extends Model
{
    use HasFactory;

    protected $table = 'bien_the_san_pham' ;

    protected $fillable = [
         'san_pham_id',
    'dung_luong',
    'mau_sac',
    'anh',
    'gia',
    'so_luong',
    ];









}
