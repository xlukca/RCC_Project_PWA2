<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::withTrashed()->with('department')->orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->paginate(10);

        return view('admin.employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $create = true;

        return view('admin.employees.upsert')->with('create', $create)->with('departmentList', $this->departmentList());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name'                   => 'required|string',
            'last_name'                    => 'required|string',
            'email'                        => 'required|email|unique:employees,email',
            'department_id'                => 'required|regex:/^0*[0-9]{1,5}$/|max:5',
            'telephone'                    => 'nullable|string',
          ];
          $validated = $request->validate($rules);
  
          try {
              $d = Employee::create([
                  'first_name'              => $request['first_name'],
                  'last_name'               => $request['last_name'],
                  'email'                   => $request['email'],
                  'department_id'           => $request['department_id'],
                  'telephone'               => $request['telephone'],
              ]);
              session()->flash('success', 'Employee was successfully created.');
              return redirect()->route('employees.index');
          } catch (Exception $e) {
              session()->flash('failure', $e->getMessage());
              return redirect()->back()->withInput();
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $create = false;

        return view('admin.employees.upsert')->with('employee', Employee::find($employee->id))->with('create', $create)->with('departmentList', $this->departmentList());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $rules = [
            'first_name'                   => 'required|string',
            'last_name'                    => 'required|string',
            'email'                        => 'required|email',
            'department_id'                => 'required|regex:/^0*[0-9]{1,5}$/|max:5',
            'telephone'                    => 'nullable|string',
        ];
        $validated = $request->validate($rules);

        $em = Employee::find($employee->id);
        $em->first_name                      = $request->first_name;
        $em->last_name                       = $request->last_name;
        $em->email                           = $request->email;
        $em->department_id                   = $request->department_id;
        $em->telephone                       = $request->telephone;

        try {
            $em->save();
            session()->flash('success', 'Employee was successfully updated.');
            return redirect()->route('employees.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            session()->flash('success', 'Employee was successfully deleted');
            return redirect()->route('employees.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }  
    }

    public function forceDestroy($id)
    {
        try {
            Employee::withTrashed()->find($id)->forceDelete();
            session()->flash('success', 'Employee was permanently deleted');
            return redirect()->route('employees.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }
    }

    public function restore($id)
    {
        try {
            Employee::withTrashed()->find($id)->restore();
            session()->flash('success', 'Employee has been restored');
            return redirect()->route('employees.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }
    }
}
