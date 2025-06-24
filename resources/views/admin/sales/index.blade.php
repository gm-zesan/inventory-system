@extends('admin.app')
@section('title') Sales @endsection

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
                        <div class="table-title">Sales</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Sales</li>
                            </ol>
                        </nav>
                    </div>
                    <a href="{{ route('sales.create') }}" class="add-new">Create Sale <i class="ms-1 ri-add-line"></i></a>
                </div>
                <div class="card-body" style="overflow-x: auto">
                    <table class="table dataTable w-100" id="sales-table" style="min-width: 800px;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Items</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>VAT</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
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
        const listUrl = "{{ route('sales.index') }}";

        $(document).ready(function () {
            $('#sales-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                columns: [
                    { data: 'id' },
                    { data: 'items_list', orderable: false, searchable: false },
                    { data: 'subtotal' },
                    { data: 'discount' },
                    { data: 'vat' },
                    { data: 'total' },
                    { data: 'paid' },
                    { data: 'due' },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btns = '';
                            btns += '<div class="action-btn">';
                            btns += '<a href="' + SITEURL + '/dashboard/sales/' + data + '/edit" title="Edit" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btns += '<form action="' + SITEURL + '/dashboard/sales/' + data + '" method="POST" style="display: inline;" onsubmit="return confirm(\'Are you sure to delete this sale?\');">' +
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
