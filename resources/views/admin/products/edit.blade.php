@extends('admin.app')
@section('title')
    Edit Product
@endsection

@section('content')
<div class="container-fluid my-3">
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-4">
            <!-- Left Side -->
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Edit Product</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('products.index') }}">Products</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Edit Product
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('products.index') }}" class="add-new">
                            Products <i class="ms-1 ri-list-ordered-2"></i>
                        </a>
                    </div>
                    <div class="card-body custom-form">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="name" class="form-label custom-label">Product Name</label>
                                <input type="text" class="form-control custom-input" name="name" placeholder="Product Name"
                                    value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="purchase_price" class="form-label custom-label">Purchase Price</label>
                                <input type="number" class="form-control custom-input" name="purchase_price"
                                    placeholder="Purchase Price" step="0.01"
                                    value="{{ old('purchase_price', $product->purchase_price) }}">
                                @error('purchase_price')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="sell_price" class="form-label custom-label">Sell Price</label>
                                <input type="number" class="form-control custom-input" name="sell_price"
                                    placeholder="Sell Price" step="0.01"
                                    value="{{ old('sell_price', $product->sell_price) }}">
                                @error('sell_price')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="stock" class="form-label custom-label">Stock</label>
                                <input type="number" class="form-control custom-input" name="stock"
                                    placeholder="Stock Quantity"
                                    value="{{ old('stock', $product->stock) }}">
                                @error('stock')
                                    <div class="error_msg">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side -->
            <div class="col-md-4 col-12">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Action</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn submit-button">Update
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('products.index') }}" class="btn leave-button">Leave</a>
                                    </div>
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
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });
    </script>
@endpush
