<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $primaryKey = 'cart_id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'customer_id', 'product_id', 'count',
    ];
}
