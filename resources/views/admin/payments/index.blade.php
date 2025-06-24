@extends('admin.app')
@section('title') Payments @endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="container-fluid my-3">
    <div class="row">
        <div class="col-12">
            <div class="card table-card">
                <div class="card-header table-header">
                    <div class="title-with-breadcrumb">
                        <div class="table-title">Payments</div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Payments</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="card-body" style="overflow-x: auto;">
                    <table class="table dataTable w-100" id="payments-table" style="min-width: 800px;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Sale ID</th>
                                <th>Amount</th>
                                <th>Method</th>
                                <th>Payment Date</th>
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
        const listUrl = "{{ route('payments.index') }}";

        $(document).ready(function () {
            $('#payments-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: listUrl,
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'sale_id', name: 'sale_id' },
                    { data: 'amount', name: 'amount' },
                    { data: 'method', name: 'method' },
                    { data: 'payment_date', name: 'payment_date' }
                ]
            });
        });
    </script>
@endpush
