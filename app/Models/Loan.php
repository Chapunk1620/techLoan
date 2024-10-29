<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        // 'date' => 'datetime:m-d-Y g:i A',        // mm-dd-yyyy format with time
        // 'due_date' => 'datetime:m-d-Y g:i A',    // mm-dd-yyyy format with time
        // 'created_at' => 'datetime:m-d-Y g:i A',  // mm-dd-yyyy format with time
        // 'updated_at' => 'datetime:m-d-Y g:i A',  // mm-dd-yyyy format with time
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_key', 'item_key');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}