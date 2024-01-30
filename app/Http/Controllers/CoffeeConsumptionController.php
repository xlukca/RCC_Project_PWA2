<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CoffeeConsumption;
use Exception;
use Illuminate\Support\Facades\DB;

class CoffeeConsumptionController extends Controller
{

    public function showEmployee()
    {
        $employees = Employee::orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->get();
       
        return view('user.coffee.index')->with('employees', $employees);
    }


    public function registerCoffee(Request $request)
    {
        $rules = 
        [
            'employee_id' => 'required|exists:employees,id',
        ];
      
      $validated = $request->validate($rules);

      try {
          $d = CoffeeConsumption::create([
              'employee_id'              => $request['employee_id'],
              'year_of_order'            => now()->format('Y'),
              'month_of_order'            => now()->format('m'),
              'day_of_order'            => now()->format('d'),
          ]);
          session()->flash('success', 'Coffee was successfully registered.');
          return redirect()->route('coffee');
      } catch (Exception $e) {
          session()->flash('failure', $e->getMessage());
          return redirect()->back()->withInput();
      }
}

    public function searchCoffee(Request $request)
{
    $selectedYears = $request->input('year_of_order');
    $selectedMonths = $request->input('month_of_order');
    $selecteddays = $request->input('day_of_order');
    $selectedEmployees = $request->input('employee_id');

    $query = CoffeeConsumption::with('employee');

    if ($selectedYears) {
        $query->whereIn('year_of_order', $selectedYears);
    }

    if ($selectedMonths) {
        $query->whereIn('month_of_order', $selectedMonths);
    }

    if ($selecteddays) {
        $query->whereIn('day_of_order', $selecteddays);
    }

    if ($selectedEmployees) {
        $query->whereIn('employee_id', $selectedEmployees);
    }

    $results = $query->orderBy('year_of_order', 'asc')
                    ->orderBy('month_of_order', 'asc')
                    ->orderBy('day_of_order', 'asc')
                    ->orderBy('employee_id', 'asc')
                    ->get();

    $year = CoffeeConsumption::select('year_of_order')->with('employee')->orderby('year_of_order', 'asc')->distinct()->get();
    $month = CoffeeConsumption::select('month_of_order')->with('employee')->orderby('month_of_order', 'asc')->distinct()->get();
    $employee_id = CoffeeConsumption::select('employee_id')->with('employee')->orderby('employee_id', 'asc')->distinct()->get();

    return view('user.coffee.consumption', compact('results', 'year', 'month', 'employee_id'));
}

}
