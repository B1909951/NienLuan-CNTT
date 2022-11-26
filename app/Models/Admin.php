<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = "admins";
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'avatar'
    ];
}
