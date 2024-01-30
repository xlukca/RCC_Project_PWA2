@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-4">Account Management</h3>

    <div>
        <a class="btn btn-primary mb-3" href="{{ route('account.exportPDF') }}" target="_blank">Export to PDF</a>
        <a class="btn btn-success mb-3" href="{{ route('account.exportXLS') }}">Export to XLSX</a>
    </div>

    <table class="table table-striped table-hover" id="dataTable">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Income</th>
                <th>Expenses</th>
                <th>Difference</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($managements as $m)
            <tr>
                <td>{{ $m->last_name }} {{ $m->first_name }}</td>
                <td>{{ $m->payment->sum('income') }} €</td>
                <td>{{ $m->consumption->count() * 0.3 }} €</td>
                <td>{{ $m->payment->sum('income') - $m->consumption->count() * 0.3 }} €</td>
            </tr>
            @endforeach
        </tbody>    
    </table>
    {{-- {{ $managements->links() }} --}}
</div>

@endsection