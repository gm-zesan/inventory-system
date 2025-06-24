<?php
namespace App\Services;
use App\Models\Journal;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class SaleService
{
    public function createSale($data)
    {
        return DB::transaction(function () use ($data) {
            [$subtotal, $saleItems] = $this->calculateSubtotal($data['products'], $data['quantities']);

            $discount = $data['discount'] ?? 0;
            $afterDiscount = $subtotal - $discount;
            $vat = $afterDiscount * 0.05;
            $total = $afterDiscount + $vat;
            $paid = $data['paid'];
            $due = $total - $paid;

            $sale = Sale::create([
                'subtotal' => $subtotal,
                'discount' => $discount,
                'vat'      => $vat,
                'total'    => $total,
                'paid'     => $paid,
                'due'      => $due,
            ]);

            foreach ($saleItems as $item) {
                $item['sale_id'] = $sale->id;
                SaleItem::create($item);
                Product::find($item['product_id'])->decrement('stock', $item['quantity']);
            }

            Payment::create([
                'sale_id' => $sale->id,
                'amount'  => $paid,
                'method'  => $due > 0 ? 'due' : 'cash',
            ]);

            $this->createJournalEntries($sale, $discount, $vat, $paid, $due);

            return $sale;
        });
    }

    public function updateSale(Sale $sale, $data)
    {
        return DB::transaction(function () use ($sale, $data) {
            foreach ($sale->saleItems as $item) {
                Product::find($item->product_id)->increment('stock', $item->quantity);
            }

            $sale->saleItems()->delete();
            $sale->payments()->delete();
            $sale->journals()->delete();

            [$subtotal, $saleItems] = $this->calculateSubtotal($data['products'], $data['quantities']);

            $discount = $data['discount'] ?? 0;
            $afterDiscount = $subtotal - $discount;
            $vat = $afterDiscount * 0.05;
            $total = $afterDiscount + $vat;
            $paid = $data['paid'];
            $due = $total - $paid;

            $sale->update([
                'subtotal' => $subtotal,
                'discount' => $discount,
                'vat'      => $vat,
                'total'    => $total,
                'paid'     => $paid,
                'due'      => $due,
            ]);

            foreach ($saleItems as $item) {
                $item['sale_id'] = $sale->id;
                SaleItem::create($item);
                Product::find($item['product_id'])->decrement('stock', $item['quantity']);
            }

            Payment::create([
                'sale_id' => $sale->id,
                'amount'  => $paid,
                'method'  => $due > 0 ? 'due' : 'cash',
            ]);

            $this->createJournalEntries($sale, $discount, $vat, $paid, $due);

            return $sale;
        });
    }

    public function deleteSale(Sale $sale)
    {
        DB::transaction(function () use ($sale) {
            foreach ($sale->saleItems as $item) {
                Product::find($item->product_id)->increment('stock', $item->quantity);
            }

            $sale->delete();
        });
    }

    private function calculateSubtotal($products, $quantities)
    {
        $subtotal = 0;
        $items = [];

        foreach ($products as $key => $productId) {
            $product = Product::findOrFail($productId);
            $quantity = $quantities[$key];

            $lineTotal = $product->sell_price * $quantity;
            $subtotal += $lineTotal;

            $items[] = [
                'product_id'  => $productId,
                'quantity'    => $quantity,
                'unit_price'  => $product->sell_price,
                'total_price' => $lineTotal,
            ];
        }

        return [$subtotal, $items];
    }

    private function createJournalEntries(Sale $sale, $discount, $vat, $paid, $due)
    {
        $journals = [
            ['type' => 'Sales',   'amount' => $sale->total, 'sale_id' => $sale->id],
            ['type' => 'Discount','amount' => $discount,    'sale_id' => $sale->id],
            ['type' => 'VAT',     'amount' => $vat,         'sale_id' => $sale->id],
            ['type' => 'Cash',    'amount' => $paid,        'sale_id' => $sale->id],
            ['type' => 'Due',     'amount' => $due,         'sale_id' => $sale->id],
        ];

        foreach ($journals as $journal) {
            if ($journal['amount'] > 0) {
                Journal::create($journal);
            }
        }
    }
}