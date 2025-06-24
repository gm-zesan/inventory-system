@extends('admin.app')
@section('title') Financial Report @endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        .custom-label {
            font-weight: 500;
            color: #333;
        }
        .custom-input {
            border-radius: 0.25rem;
            border: 1px solid #ced4da;
        }
        .custom-input:focus {
            border-color: #845adf;
            box-shadow: none;
            outline: none;
        }
        .btn-filter {
            background-color: #845adf;
            color: #fff;
            border-radius: 0.25rem;
            padding: 6px 15px;
            font-size: 13px;
            transition: .3s ease;
        }
        .btn-filter:hover {
            background-color: #6f4ac7;
            color: #fff;
        }
        .btn-filter:focus {
            box-shadow: none;
            outline: none;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid my-3">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Financial Report</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Report</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body">
                    <form method="GET" action="{{ route('reports.index') }}" class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label for="from" class="form-label custom-label">From</label>
                            <input type="text" class="form-control custom-input datepicker" name="from" value="{{ request('from') ?? now()->startOfMonth()->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="to" class="form-label custom-label">To</label>
                            <input type="text" class="form-control custom-input datepicker" name="to" value="{{ request('to') ?? now()->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-3 align-self-end">
                            <button type="submit" class="btn btn-filter">Filter</button>
                        </div>
                    </form>

                    <div class="row text-center mb-4">
                        <div class="col-md-2">
                            <div class="report-box bg-light p-3 rounded shadow-sm">
                                <h6>Total Sales</h6>
                                <p class="fw-bold text-success">{{ number_format($totalSales, 2) }} TK</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="report-box bg-light p-3 rounded shadow-sm">
                                <h6>Discount</h6>
                                <p class="fw-bold text-danger">{{ number_format($totalDiscount, 2) }} TK</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="report-box bg-light p-3 rounded shadow-sm">
                                <h6>VAT</h6>
                                <p class="fw-bold text-warning">{{ number_format($totalVat, 2) }} TK</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="report-box bg-light p-3 rounded shadow-sm">
                                <h6>Paid</h6>
                                <p class="fw-bold text-primary">{{ number_format($totalPaid, 2) }} TK</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="report-box bg-light p-3 rounded shadow-sm">
                                <h6>Due</h6>
                                <p class="fw-bold text-danger">{{ number_format($totalDue, 2) }} TK</p>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Sale ID</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>VAT</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sales as $key => $sale)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>#{{ $sale->id }}</td>
                                    <td>{{ number_format($sale->subtotal, 2) }}</td>
                                    <td>{{ number_format($sale->discount, 2) }}</td>
                                    <td>{{ number_format($sale->vat, 2) }}</td>
                                    <td>{{ number_format($sale->total, 2) }}</td>
                                    <td>{{ number_format($sale->paid, 2) }}</td>
                                    <td>{{ number_format($sale->due, 2) }}</td>
                                    <td>{{ $sale->created_at->format('d M Y') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center">No sales found in selected date range.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr(".datepicker", {
            dateFormat: "Y-m-d"
        });
    </script>
@endpush
