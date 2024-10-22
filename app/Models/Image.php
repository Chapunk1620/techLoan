<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['loan_id', 'file_name', 'file_path'];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}

