<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;
use App\Models\CoffeeConsumption;
use App\Models\Employee;
use Exception;

class NotificationController extends Controller
{
    public function index(){

    $years = CoffeeConsumption::select('year_of_order')->with('employee')->orderby('year_of_order', 'asc')->distinct()->get();
    $months = CoffeeConsumption::select('month_of_order')->with('employee')->orderby('month_of_order', 'asc')->distinct()->get();
    
          return view('admin.notifications.index', compact('years', 'months'));
    }

    public function sendEmail(Request $request){


        $employee = Employee::with(['consumption', 'payment']);

        $selectedYears = $request->input('year_of_order');
        $selectedMonths = $request->input('month_of_order');


        $employee->whereHas('consumption', function ($query) use ($selectedYears, $selectedMonths) {
         
        if ($selectedYears) {
            $query->whereIn('year_of_order', $selectedYears);
        }
    
        if ($selectedMonths) {
            $query->whereIn('month_of_order', $selectedMonths);
        }
    });

        $results = $employee->get();
// dd($selectedMonths);
$coffee_num = [];

    foreach ($results as $res) {
        foreach ($res->consumption as $r) {
            if (in_array($r->year_of_order, $selectedYears)) {
            if (in_array($r->month_of_order, $selectedMonths)) {
                 $coffee_num[] = $r->employee_id; 
                }
            }
        }
    }
    
    $coffee_num = array_count_values($coffee_num);
    // dd($coffee_num);

        foreach ($results as $result) {
        try {
            Mail::to($result->email)->queue(new NotificationEmail($result, $selectedMonths, $coffee_num));
            session()->flash('success', 'Emails were sent successfully');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
        } 
    }
        return redirect()->back();
    }
}
