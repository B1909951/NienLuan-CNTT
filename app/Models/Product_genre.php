<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_genre extends Model
{
    use HasFactory;
    protected $table = "product_genres";
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'product_id', 'genre_id', 'name'
    ];}
