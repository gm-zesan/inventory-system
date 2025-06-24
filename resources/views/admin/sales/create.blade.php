@extends('admin.app')
@section('title')
    Create Sale
@endsection

@push('custom-style')
    <style>
        .is-invalid {
            border-color: red;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid my-3">
        <form action="{{ route('sales.store') }}" method="POST">
            @csrf
            <div class="row g-4">

                <div class="col-md-8 col-12">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Create Sale</div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('sales.index') }}">Sales</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Create Sale
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="{{ route('sales.index') }}" class="add-new">
                                Sales <i class="ms-1 ri-list-ordered-2"></i>
                            </a>
                        </div>

                        <div class="card-body custom-form">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="sale-items">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price (tk)</th>
                                            <th>Qty</th>
                                            <th>Total (tk)</th>
                                            <th><button type="button" class="btn btn-sm btn-success" id="add-row"><i class="ri-add-line"></i></button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="products[]" class="form-control product-select custom-input">
                                                    <option value="">Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}" data-price="{{ $product->sell_price }}">
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" class="form-control custom-input price" name="prices[]" readonly></td>
                                            <td><input type="number" class="form-control custom-input qty" name="quantities[]" min="1" value="1"></td>
                                            <td><input type="number" class="form-control custom-input total" name="totals[]" readonly></td>
                                            <td><button type="button" class="btn btn-sm btn-danger remove-row"><i class="ri-delete-bin-2-line"></i></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-12">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Summary</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="mb-2">
                                        <label class="custom-label">Subtotal (tk)</label>
                                        <input type="number" name="subtotal" id="subtotal" class="form-control custom-input" readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label class="custom-label">Discount (flat amount - tk)</label>
                                        <input type="number" name="discount" id="discount" class="form-control custom-input" value="0">
                                    </div>
                                    <div class="mb-2">
                                        <label class="custom-label">VAT (5% - tk)</label>
                                        <input type="number" name="vat" id="vat" class="form-control custom-input" readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label class="custom-label">Total (tk)</label>
                                        <input type="number" name="total" id="total" class="form-control custom-input" readonly>
                                    </div>
                                    <div class="mb-2">
                                        <label class="custom-label">Paid (tk)</label>
                                        <input type="number" name="paid" id="paid" class="form-control custom-input" value="0">
                                    </div>
                                    <div class="mb-2">
                                        <label class="custom-label">Due (tk)</label>
                                        <input type="number" name="due" id="due" class="form-control custom-input" readonly>
                                    </div>

                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="submit" class="btn submit-button">Save
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                        <a href="{{ route('sales.index') }}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('custom-scripts')
    @include('admin.includes.sales-script')
@endpush
