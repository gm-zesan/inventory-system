@extends('admin.app')

@section('title')
    Dashboard
@endsection



@section('content')
<div class="container-fluid my-3">
    <div class="row mb-5 g-3">

        {{-- Products --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg">
                    <div class="dashboard-icon">
                        <a href="{{ route('products.index') }}"><i class="ri-box-3-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Products</h4>
                        <h3 class="numbers">{{ $productCount }} +</h3>
                        <a href="{{ route('products.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sales --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg non">
                    <div class="dashboard-icon">
                        <a href="{{ route('sales.index') }}"><i class="ri-shopping-cart-2-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Total Sales</h4>
                        <h3 class="numbers">{{ $salesCount }} +</h3>
                        <a href="{{ route('sales.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Low Stock Products --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg">
                    <div class="dashboard-icon">
                        <a href="{{ route('products.index') }}"><i class="ri-alert-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Low Stock</h4>
                        <h3 class="numbers">{{ $lowStockCount }}</h3>
                        <a href="{{ route('products.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Low Stock Products --}}


        {{-- Payments --}}
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card dashboard-card">
                <div class="card-body target-bg non">
                    <div class="dashboard-icon">
                        <a href="{{ route('payments.index') }}"><i class="ri-bank-card-line"></i></a>
                    </div>
                    <div class="dashboard-info">
                        <h4 class="target-title">Total Payments</h4>
                        <h3 class="numbers">৳{{ number_format($totalPayment, 2) }}</h3>
                        <a href="{{ route('payments.index') }}">View all<i class="ms-2 ri-arrow-right-line"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row g-4">
        <div class="col-lg-8 col-12">
            <div class="card dashboard-card">
                <div class="card-header table-header">
                    <h4>Recent Sales</h4>
                </div>
                <div class="card-body">
                    <div class="card dashboard-card">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Sale ID</th>
                                    <th>Date</th>
                                    <th>Total (tk)</th>
                                    <th>Paid (tk)</th>
                                    <th>Due (tk)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentSales as $sale)
                                    <tr>
                                        <td>{{ $sale->id }}</td>
                                        <td>{{ $sale->created_at->format('d M Y') }}</td>
                                        <td>{{ $sale->total }}</td>
                                        <td>{{ $sale->paid }}</td>
                                        <td>{{ $sale->due }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('sales.index') }}" class="btn btn-primary mt-3">View All Sales</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card dashboard-card">
                <div class="card-header table-header">
                    <h4>Top Selling Products</h4>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($topProducts as $product)
                            <li>{{ $product->name }} - {{ $product->total_sold }} sold</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

