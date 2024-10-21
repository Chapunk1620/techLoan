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
        'date' => 'datetime:Y-m-d g:i A',
        'due_date' => 'datetime:m-d-Y g:i A',
        'created_at' => 'datetime:Y-m-d g:i A',
        'updated_at' => 'datetime:Y-m-d g:i A',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_key', 'item_key');
    }
}