<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $primaryKey = 'customer_id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'address'
    ];
}
