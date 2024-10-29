<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $guarded = [];
    protected $casts = [
        'date_arrival' => 'datetime:Y-m-d H:i:s', // yyyy-mm-dd format with time
        'created_at' => 'datetime:Y-m-d H:i:s',   // yyyy-mm-dd format with time
    ];
}
