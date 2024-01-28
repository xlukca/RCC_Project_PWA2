@extends('user.layouts.app')
@section('content')

<style>h1, h3, th, td, label, p {
    color: #f8f8f8;
    }
</style>

<h1>Coffee consumption</h1>

<div class="headline mt-3 mb-3"><h3>Search criteria</h3></div> 

<form action="{{ route('searchCoffee') }}" method="GET">
    
    <div class="row mt-2 mb-4">
        <div class="col-md-2">
            <label class="form-label">Year</label>  
            <select class="form-control" name="year_of_order[]" required multiple>
            @foreach($year as $y)
            <option>{{ $y->year_of_order }}</option>
            @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label class="form-label">Month</label>  
            <select class="form-control" name="month_of_order[]" required multiple>
            @foreach($month as $m)
            <option>{{ $m->month_of_order }}</option>
            @endforeach
            </select>
        </div>
      
        <div class="col-md-3">
            <label class="form-label">Employee</label>  
            <select class="form-control" name="employee_id[]" required multiple>
            @foreach($employee_id->sortBy('employee.employee_full_name_reverse') as $em)
            <option value="{{ $em->employee_id }}">{{ $em->employee->employee_full_name_reverse }}</option>
            @endforeach
            </select>
        </div>
         
    <div class="row mt-3 mb-5">
        <div class="col-md-10">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
    </div>
</form>

@if(isset($results) && $results->count() > 0)
    <div class="intro-text left-0 text-center bg-faded p-1 rounded mb-3" style="background-color: #226e0f; max-width: 600px; position: relative; left: 10px;">
        <p>In the given time period, the following were drunk: {{ $results->count() }} coffee(s).</p>  
    </div>
    <div>
        <table class="table table-bordered" style="background-color: #422812; color: #000000; max-width: 700px">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Employee</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{ $result->year_of_order }}-{{ $result->month_of_order }}-{{ $result->day_of_order }}</td>
                        <td>{{ $result->employee->employee_full_name_reverse }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    </div>  
@else
<div class="intro-text left-0 text-center bg-faded p-1 rounded mb-3" style="background-color: #092755; max-width: 600px; position: relative; left: 10px;">
    <p>There is no record of coffee consumption in the given time period.</p>
</div>
@endif

@endsection