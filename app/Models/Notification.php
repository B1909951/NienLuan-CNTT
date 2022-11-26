<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notifications";
    protected $primaryKey = 'notif_id';
    protected $dateFormat = 'Y-m-d';
    protected $fillable = [
        'customer_id', 'admin_id', 'message'
    ];
}
