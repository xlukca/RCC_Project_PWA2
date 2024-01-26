<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Exception;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::withTrashed()->orderBy('id', 'asc')->paginate(10);

        return view('admin.departments.index')->with('departments', $departments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $create = true;

        return view('admin.departments.upsert')->with('create', $create);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id'                        => 'required|regex:/^0*[0-9]{4,5}$/|max:5',
            'name_of_department'        => 'required|string',
            'street'                    => 'required|string',
            'postcode'                  => 'required|regex:/\b\d{5}\b/',
            'city'                      => 'required|string',
            'country'                   => 'required|string',
          ];
          $validated = $request->validate($rules);
  
          try {
              $d = Department::create([
                  'id'                      => $request['id'],
                  'name_of_department'      => $request['name_of_department'],
                  'street'                  => $request['street'],
                  'postcode'                => $request['postcode'],
                  'city'                    => $request['city'],
                  'country'                 => $request['country'],
              ]);
              session()->flash('success', 'Department was successfully created.');
              return redirect()->route('departments.index');
          } catch (Exception $e) {
              session()->flash('failure', $e->getMessage());
              return redirect()->back()->withInput();
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $create = false;

        return view('admin.departments.upsert')->with('department', Department::find($department->id))->with('create', $create);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $rules = [
            'id'                        => 'required|regex:/^0*[0-9]{1,5}$/|max:5',
            'name_of_department'        => 'required|string',
            'street'                    => 'required|string',
            'postcode'                  => 'required|regex:/\b\d{5}\b/',
            'city'                      => 'required|string',
            'country'                   => 'required|string',
        ];
        $validated = $request->validate($rules);

        $d = Department::find($department->id);
        $d->id                      = $request->id;
        $d->name_of_department      = $request->name_of_department;
        $d->street                  = $request->street;
        $d->postcode                = $request->postcode;
        $d->city                    = $request->city;
        $d->country                 = $request->country;

        try {
            $d->save();
            session()->flash('success', 'Department was successfully updated.');
            return redirect()->route('departments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            $department->delete();
            session()->flash('success', 'Department was successfully deleted');
            return redirect()->route('departments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }    
    }

    public function forceDestroy($id)
    {
        try {
            Department::withTrashed()->find($id)->forceDelete();
            session()->flash('success', 'Department was permanently deleted');
            return redirect()->route('departments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }
    }

    public function restore($id)
    {
        try {
            Department::withTrashed()->find($id)->restore();
            session()->flash('success', 'Department has been restored');
            return redirect()->route('departments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }
    }
}
