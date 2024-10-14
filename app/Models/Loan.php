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
        'date' => 'datetime:Y-m-d H:i:s',
        'due_date' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_key', 'item_key');
    }
}