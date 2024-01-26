@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h3 class="mb-5">Add a new Payment</h3>

    @if($create == true)
    {{ Form::open(['route' => 'payments.store']) }}
    @else
    {{ Form::model($payment, ['route' => ['payments.update', $payment->id], 'method' => 'PUT']) }}
    @endif

    @include('_templates.form-select', ['space' => 'payment', 'tag' => 'employee_id', 'list' => $employeeList])
    @include('_templates.form-text', ['space' => 'payment', 'tag' => 'income', 'placeholder' => 'Income in the format: 1.55'])
    @include('_templates.form-date', ['space' => 'payment', 'tag' => 'date_of_income'])

    {{ Form::submit(__('Submit'), array('class' => 'btn btn-sm btn-primary mt-3')) }}

    {{ Form::close() }}

</div>

@endsection