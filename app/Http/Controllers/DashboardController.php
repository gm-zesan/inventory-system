<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount = Product::count();
        $salesCount = Sale::count();
        $lowStockCount = Product::where('stock', '<=', 10)->count();
        $totalPayment = Payment::sum('amount');

        $recentSales = Sale::latest()->limit(5)->get();

        $topProducts = SaleItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->limit(5)
            ->get()
            ->map(fn($item) => (object)[
                'name' => $item->product->name,
                'total_sold' => $item->total_sold,
            ]);


        return view('admin.home.index', [
            'productCount' => $productCount,
            'salesCount' => $salesCount,
            'lowStockCount' => $lowStockCount,
            'totalPayment' => $totalPayment,
            'recentSales' => $recentSales,
            'topProducts' => $topProducts,
        ]);
    }

    public function cacheClear()
    {
        Artisan::call('optimize:clear');
        return back()->with('success', 'Cache Cleared Successfully');
    }
}
