<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
// PaymentController.php

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Payment::with('sale')->select('payments.*');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('sale_id', function ($row) {
                    return $row->sale ? '#' . $row->sale->id : 'N/A';
                })
                ->addColumn('amount', function ($row) {
                    return number_format($row->amount, 2) . ' TK';
                })
                ->addColumn('method', function ($row) {
                    return ucfirst($row->method);
                })
                ->addColumn('payment_date', function ($row) {
                    return $row->created_at->format('d-M-Y h:i A');
                })
                ->rawColumns(['sale_id', 'amount', 'method', 'payment_date'])
                ->make(true);
        }

        return view('admin.payments.index');
    }



}
