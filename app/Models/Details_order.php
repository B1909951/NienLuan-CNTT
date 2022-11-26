<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details_order extends Model
{
    use HasFactory;
    protected $table = "details_orders";
    protected $primaryKey = 'details_order_id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'customer_id', 'product_id', 'order_id', 'count',
    ];
}
