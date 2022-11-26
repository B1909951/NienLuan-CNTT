<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $primaryKey = 'order_id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'customer_id', 'coupon_id', 'sub_total','total','type','address'
    ];
}
