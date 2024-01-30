@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-5">List of Employees</h3>
    <p><a href="{{ route('employees.create') }}" class="btn btn-secondary">Add a new Employee</a></p>
    <table class="table table-striped table-hover" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Department</th>
                <th>Department ID</th>
                <th>Telephone</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $e)
            <tr @if($e->trashed())class="table-danger"@endif>
                <td>{{ $e->id }}</td>
                <td>{{ $e->first_name }}</td>
                <td>{{ $e->last_name }}</td>
                <td>{{ $e->email }}</td>
                <td>{{ $e->department->name_of_department ?? null }}</td>
                <td>{{ $e->department->id ?? null}}</td>
                <td>{{ $e->telephone }}</td>
                @if($e->trashed())
                  <td></td>
                @else
                  <td><a class="btn btn-info" href="{{ route('employees.edit', $e->id) }}">Edit</a></td>
                @endif
                <td>
                    @if(!$e->trashed())
                    {!! Form::open(array('route' => ['employees.destroy', $e->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('Delete'), array('class' => 'btn btn-danger', 'onclick' => 'return confirm("' . 'Confirm Delete' . '")')) !!}
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(array('route' => ['employees.forceDestroy', $e->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('Permanent Delete'), array('class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("' . 'Confirm permanently delete' . '")')) !!}
                    {!! Form::close() !!}
                    {!! Form::open(array('route' => ['employees.restore', $e->id], 'method'=>'POST')) !!}
                    {!! Form::submit(__('Restore'), array('class' => 'btn btn-success btn-sm mt-1')) !!}
                    {!! Form::close() !!}
                    @endif                
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
    {{-- {{ $employees->links() }} --}}
</div>

@endsection