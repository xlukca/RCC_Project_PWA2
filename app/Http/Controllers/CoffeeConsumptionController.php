<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\CoffeeConsumption;
use Exception;

class CoffeeConsumptionController extends Controller
{

    public function showEmployee()
    {
        $employees = Employee::orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->get();
       
        return view('user.coffee.index')->with('employees', $employees);
    }


    public function registerConsumption(Request $request)
    {
        $rules = 
        [
            'employee_id' => 'required|exists:employees,id',
        ];
      
      $validated = $request->validate($rules);

      try {
          $d = CoffeeConsumption::create([
              'employee_id'              => $request['employee_id'],
              'date_of_order'            => now(),
          ]);
          session()->flash('success', 'Coffee was successfully registered.');
          return redirect()->route('coffee.menu');
      } catch (Exception $e) {
          session()->flash('failure', $e->getMessage());
          return redirect()->back()->withInput();
      }
}

}
