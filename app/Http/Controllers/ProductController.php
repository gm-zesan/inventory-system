<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::select(['id', 'name', 'purchase_price', 'sell_price', 'stock']);

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action-btn', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }

        return view('admin.products.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product deleted');
    }
}
