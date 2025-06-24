@extends('admin.app')
@section('title') Products @endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
<div class="container-fluid my-3">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Products</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('products.create') }}" class="add-new">Add Product <i class="ms-1 ri-add-line"></i></a>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    <table class="table dataTable w-100" id="product-table" style="min-width: 800px;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Purchase Price</th>
                                <th>Sell Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script>
        const listUrl = "{{ route('products.index') }}";
        $(document).ready(function () {
            $('#product-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                columns: [
                    { data: 'id' },
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'purchase_price', name: 'purchase_price', orderable: false },
                    { data: 'sell_price', name: 'sell_price', orderable: false },
                    { data: 'stock', name: 'stock', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btns = '';
                                btns += '<div class="action-btn">';

                                btns += '<a href="' + SITEURL + '/dashboard/products/' + data + '/edit" title="Edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';

                                btns += '<form action="' + SITEURL + '/dashboard/products/' + data + '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this product?\');">' +
                                    '@csrf' +
                                    '@method("DELETE")' +
                                    '<button type="submit" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></button>' +
                                '</form>';

                            btns += '</div>';
                            return btns;
                        }
                    }
                ]
            });
        });
    </script>
@endpush
