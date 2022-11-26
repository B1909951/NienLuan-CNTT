<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = "coupons";
    protected $primaryKey = 'coupon_id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'code', 'value'
    ];
}
