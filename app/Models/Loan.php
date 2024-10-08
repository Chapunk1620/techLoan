<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';
    protected $fillable = [
        'id_borrower',
        'borrower_name',
        'item_key',
        'date',
        'due_date',
        'status',
        'description',
        'it_approver',
        'it_receiver',
    ];

    protected $casts = [
        'date' => 'date',
        'due_date' => 'date',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_key', 'item_key');
    }
}