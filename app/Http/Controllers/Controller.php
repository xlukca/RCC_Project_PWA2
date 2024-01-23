<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Department;

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
}
