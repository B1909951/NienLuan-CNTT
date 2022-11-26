<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $table = "rates";
    protected $primaryKey = 'rate_id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'product_id', 'customer_id', 'comment', 'rating'
    ];
}
