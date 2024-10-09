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
        'date' => 'date',
        'due_date' => 'date',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_key', 'item_key');
    }
}