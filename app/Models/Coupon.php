<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'value', 'expiration_date'];

    public function isValid()
    {
        return now()->lessThanOrEqualTo($this->expiration_date);
    }
}
