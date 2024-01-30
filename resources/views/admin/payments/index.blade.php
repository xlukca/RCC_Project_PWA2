@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-5">List of Payments</h3>
    <p><a href="{{ route('payments.create') }}" class="btn btn-secondary">Add a new Payment</a></p>
    <table class="table table-striped table-hover" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Employee ID</th>
                <th>Income</th>
                <th>Date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $p)
            <tr @if($p->trashed())class="table-danger"@endif>
                <td>{{ $p->id }}</td>
                <td>{{ $p->employee->employee_full_name ?? null }}</td>
                <td>{{ $p->employee->id ?? null }}</td>
                <td>{{ $p->income }} €</td>
                <td>{{ $p->date_of_income }}</td>
                @if($p->trashed())
                  <td></td>
                @else
                  <td><a class="btn btn-info" href="{{ route('payments.edit', $p->id) }}">Edit</a></td>
                @endif
                <td>
                    @if(!$p->trashed())
                    {!! Form::open(array('route' => ['payments.destroy', $p->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('Delete'), array('class' => 'btn btn-danger', 'onclick' => 'return confirm("' . 'Confirm Delete' . '")')) !!}
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(array('route' => ['payments.forceDestroy', $p->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('Permanent Delete'), array('class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("' . 'Confirm permanently delete' . '")')) !!}
                    {!! Form::close() !!}
                    {!! Form::open(array('route' => ['payments.restore', $p->id], 'method'=>'POST')) !!}
                    {!! Form::submit(__('Restore'), array('class' => 'btn btn-success btn-sm mt-1')) !!}
                    {!! Form::close() !!}
                    @endif                
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
    {{-- {{ $payments->links() }} --}}
</div>

@endsection