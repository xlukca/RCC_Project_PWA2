@extends('user.layouts.app')
@section('content')

<style>
    h1 {
            color: #f8f8f8;
        }

    .button-container {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 15px;
        text-align: center;
    }

    button {
        width: 100%;
        padding: 10px;
    }
</style>

<h1 class="mt-3 mb-3">Registration of coffee</h1>

<div class="button-container mb-3">
        <form method="post" action="{{ route('coffee.register') }}">
            @csrf
            <div class="button-container">
                @foreach ($employees as $employee)
                    <button type="submit" name="employee_id" value="{{ $employee->id }}">
                        {{ $employee->employee_full_name }}
                    </button>
                @endforeach
            </div>
        </form>
    </div>

@endsection