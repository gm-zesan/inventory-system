@extends('admin.app')
@section('title') Journal Entries @endsection

@push('custom-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="container-fluid my-3">
    <div class="card table-card">
        <div class="card-header table-header">
            <div class="title-with-breadcrumb">
                <div class="table-title">Journal Entries</div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Journals</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card-body" style="overflow-x:auto;">
            <table id="journal-table" class="table dataTable w-100" style="min-width: 800px;">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Type</th>
                        <th>Amount (TK)</th>
                        <th>Sale ID</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('#journal-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('journals.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'type', name: 'type' },
                { data: 'amount', name: 'amount' },
                { data: 'sale_id', name: 'sale_id', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at' },
            ],
            order: [[4, 'desc']]
        });
    });
</script>
@endpush
