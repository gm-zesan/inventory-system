<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Product A', 'purchase_price' => 100, 'sell_price' => 200, 'stock' => 50],
            ['name' => 'Product B', 'purchase_price' => 150, 'sell_price' => 250, 'stock' => 30],
            ['name' => 'Product C', 'purchase_price' => 120, 'sell_price' => 220, 'stock' => 40],
            ['name' => 'Product D', 'purchase_price' => 90, 'sell_price' => 190, 'stock' => 20],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
