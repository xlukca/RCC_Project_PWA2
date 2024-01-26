<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Department;
use App\Models\Employee;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function departmentList() {
        $departments = Department::orderBy('id', 'asc')->get();
        $list = [];
        foreach($departments as $d){
            $list[$d->id] = $d->id . ', ' . $d->name_of_department;
        }
        return $list;
    }

    protected function employeeList() {
        $employees = Employee::orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->get();
        $list = [];
        foreach($employees as $em){
            $list[$em->id] = $em->id . ', ' . $em->first_name . ' ' . $em->last_name;
        }
        return $list;
    }
}
