<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Services\SaleService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Sale::with('saleItems')->get();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('items_list', function ($sale) {
                    $items = $sale->saleItems->map(function ($item) {
                        return "Product: {$item->product->name} (Qty: {$item->quantity})";
                    })->implode('<br>');
                    return $items;
                })
                ->addColumn('action-btn', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['items_list', 'action-btn'])
                ->make(true);
        }

        return view('admin.sales.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $this->saleService->createSale($request->validated());
        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sale = Sale::with('saleItems')->findOrFail($id);
        $products = Product::all();
        return view('admin.sales.edit', compact('sale', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $this->saleService->updateSale($sale, $request->validated());
        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $this->saleService->deleteSale($sale);
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }

}
