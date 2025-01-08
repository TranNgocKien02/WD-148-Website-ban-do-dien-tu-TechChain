<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_lien_he',
        'ten_khach_hang',
        'email_khach_hang',
        'chu_de',
        'noi_dung',
        'is_respond',
    ];

    protected $casts = [
        'is_respond' => 'boolean',
    ];

    public function phanhois()
    {
        return $this->hasMany(PhanHoi::class);
    }

    
}
