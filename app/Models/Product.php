<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'purchase_price',
        'sell_price',
        'stock',
    ];
    protected $casts = [
        'purchase_price' => 'decimal:2',
        'sell_price' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }
}
