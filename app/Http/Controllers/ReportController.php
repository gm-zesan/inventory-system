<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from ? Carbon::parse($request->from) : now()->startOfMonth();
        $to = $request->to ? Carbon::parse($request->to) : now();

        $sales = Sale::whereBetween('created_at', [$from->startOfDay(), $to->endOfDay()])->get();

        $totalSales = $sales->sum('total');
        $totalDiscount = $sales->sum('discount');
        $totalVat = $sales->sum('vat');
        $totalPaid = $sales->sum('paid');
        $totalDue = $sales->sum('due');

        return view('admin.reports.index', compact(
            'sales', 'from', 'to', 'totalSales', 'totalDiscount', 'totalVat', 'totalPaid', 'totalDue'
        ));
    }
}
