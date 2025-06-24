<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'subtotal',
        'discount',
        'vat',
        'total',
        'paid',
        'due',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount' => 'decimal:2',
        'vat' => 'decimal:2',
        'total' => 'decimal:2',
        'paid' => 'decimal:2',
        'due' => 'decimal:2',
    ];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function journals()
    {
        return $this->hasMany(Journal::class);
    }
}
