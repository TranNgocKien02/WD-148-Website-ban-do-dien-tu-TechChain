<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoi extends Model
{
    use HasFactory;

    protected $fillable = [
        'lien_he_id',
        'nguoi_phan_hoi',
        'noi_dung',
    ];

    public function lienhe()
    {
        return $this->belongsTo(LienHe::class);
    }
}
