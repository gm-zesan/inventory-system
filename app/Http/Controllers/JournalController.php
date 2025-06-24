<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Journal::with('sale')->latest();
            

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('sale_id', function ($journal) {
                    return $journal->sale ? '#'.$journal->sale->id : '-';
                })
                ->addColumn('amount', function ($journal) {
                    return number_format($journal->amount, 2) . ' TK';
                })
                ->addColumn('created_at', function ($journal) {
                    return $journal->created_at->format('d-M-Y h:i A');
                })
                ->rawColumns(['sale_id', 'amount', 'type', 'created_at'])
                ->make(true);
        }

        return view('admin.journals.index');
    }

    
}
