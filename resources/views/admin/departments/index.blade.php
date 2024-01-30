@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-5">List of Departments</h3>
    <p><a href="{{ route('departments.create') }}" class="btn btn-secondary">Add a new Department</a></p>
    <table class="table table-striped table-hover" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name of Department</th>
                <th>Street</th>
                <th>Postcode</th>
                <th>City</th>
                <th>Country</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $d)
            <tr @if($d->trashed())class="table-danger"@endif>
                <td>{{ $d->id }}</td>
                <td>{{ $d->name_of_department }}</td>
                <td>{{ $d->street }}</td>
                <td>{{ $d->postcode }}</td>
                <td>{{ $d->city }}</td>
                <td>{{ $d->country }}</td>
                @if($d->trashed())
                  <td></td>
                @else
                  <td><a class="btn btn-info" href="{{ route('departments.edit', $d->id) }}">Edit</a></td>
                @endif
                <td>
                    @if(!$d->trashed())
                    {!! Form::open(array('route' => ['departments.destroy', $d->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('Delete'), array('class' => 'btn btn-danger', 'onclick' => 'return confirm("' . 'Confirm delete' . '")')) !!}
                    {!! Form::close() !!}
                    @else
                    {!! Form::open(array('route' => ['departments.forceDestroy', $d->id], 'method'=>'DELETE')) !!}
                    {!! Form::submit(__('Permanent Delete'), array('class' => 'btn btn-danger btn-sm', 'onclick' => 'return confirm("' . 'Confirm permanently delete' . '")')) !!}
                    {!! Form::close() !!}
                    {!! Form::open(array('route' => ['departments.restore', $d->id], 'method'=>'POST')) !!}
                    {!! Form::submit(__('Restore'), array('class' => 'btn btn-success btn-sm mt-1')) !!}
                    {!! Form::close() !!}
                    @endif                
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
    {{-- {{ $departments->links() }} --}}
</div>

@endsection