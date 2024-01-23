@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-5">Add a new Department</h3>

    @if($create == true)
    {{ Form::open(['route' => 'departments.store']) }}
    @else
    {{ Form::model($department, ['route' => ['departments.update', $department->id], 'method' => 'PUT']) }}
    @endif

    @include('_templates.form-text', ['space' => 'department', 'tag' => 'id'])
    @include('_templates.form-text', ['space' => 'department', 'tag' => 'name_of_department'])
    @include('_templates.form-text', ['space' => 'department', 'tag' => 'street'])
    @include('_templates.form-text', ['space' => 'department', 'tag' => 'postcode'])
    @include('_templates.form-text', ['space' => 'department', 'tag' => 'city'])
    @include('_templates.form-text', ['space' => 'department', 'tag' => 'country'])

    {{ Form::submit(__('Submit'), array('class' => 'btn btn-sm btn-primary mt-3')) }}

    {{ Form::close() }}

</div>

@endsection