<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Payment;
use App\Models\Journal;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $products = Product::take(3)->get();

            $quantities = [3, 2, 5];

            $subtotal = 0;
            foreach ($products as $index => $product) {
                $subtotal += $product->sell_price * $quantities[$index];
            }

            $discount = 100;
            $afterDiscount = $subtotal - $discount;
            $vat = $afterDiscount * 0.05;
            $total = $afterDiscount + $vat;
            $paid = 800;
            $due = $total - $paid;

            $sale = Sale::create([
                'subtotal' => $subtotal,
                'discount' => $discount,
                'vat' => $vat,
                'total' => $total,
                'paid' => $paid,
                'due' => $due,
            ]);

            foreach ($products as $index => $product) {
                $qty = $quantities[$index];

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'unit_price' => $product->sell_price,
                    'total_price' => $product->sell_price * $qty,
                ]);

                $product->decrement('stock', $qty);
            }

            $payments = [
                ['amount' => 300, 'method' => 'cash'],
                ['amount' => 200, 'method' => 'due'],
                ['amount' => $paid - 500, 'method' => 'cash'],
            ];

            foreach ($payments as $payment) {
                Payment::create([
                    'sale_id' => $sale->id,
                    'amount' => $payment['amount'],
                    'method' => $payment['method'],
                ]);
            }

            $journals = [
                ['type' => 'Sales', 'amount' => $total, 'sale_id' => $sale->id],
                ['type' => 'Discount', 'amount' => $discount, 'sale_id' => $sale->id],
                ['type' => 'VAT', 'amount' => $vat, 'sale_id' => $sale->id],
                ['type' => 'Cash', 'amount' => $paid, 'sale_id' => $sale->id],
                ['type' => 'Due', 'amount' => $due, 'sale_id' => $sale->id],
            ];

            foreach ($journals as $journal) {
                if ($journal['amount'] > 0) {
                    Journal::create($journal);
                }
            }
        });
    }
}
