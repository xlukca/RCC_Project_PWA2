@extends('admin.layouts.app')
@section('content')

<div class="container">
    <h1 class="mb-5">Notification</h1>

    {{ Form::open(array('route' => ['notificationEmail'], 'method'=>'POST')) }}
    
    <div class="row mt-2 mb-4">
        <div class="col-md-2">
            <label class="form-label">Year</label>  
            <select class="form-control" name="year_of_order[]" required>
                @foreach($years as $y)
                    <option>{{ $y->year_of_order }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">Month</label>  
            <select class="form-control" name="month_of_order[]" required>
                @foreach($months as $m)
                    <option>{{ $m->month_of_order }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{ Form::submit('Send emails', array('class' => 'btn btn-success')) }}
    {{ Form::close() }} 
</div>



@endsection