<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'sale_id',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
