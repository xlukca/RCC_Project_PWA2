@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-5">Add a new Employee</h3>

    @if($create == true)
    {{ Form::open(['route' => 'employees.store']) }}
    @else
    {{ Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'PUT']) }}
    @endif

    @include('_templates.form-text', ['space' => 'employee', 'tag' => 'first_name'])
    @include('_templates.form-text', ['space' => 'employee', 'tag' => 'last_name'])
    @include('_templates.form-text', ['space' => 'employee', 'tag' => 'email'])
    @include('_templates.form-select', ['space' => 'employee', 'tag' => 'department_id', 'list' => $departmentList])
    @include('_templates.form-text', ['space' => 'employee', 'tag' => 'telephone', 'placeholder' => 'Phone number in the format +421 999 888 777'])
    {{ Form::submit(__('Submit'), array('class' => 'btn btn-sm btn-primary mt-3')) }}

    {{ Form::close() }}

</div>

@endsection