<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;
use App\Models\CoffeeConsumption;
use Exception;

class NotificationController extends Controller
{
    public function index(){

    $years = CoffeeConsumption::select('year_of_order')->with('employee')->orderby('year_of_order', 'asc')->distinct()->get();
    $months = CoffeeConsumption::select('month_of_order')->with('employee')->orderby('month_of_order', 'asc')->distinct()->get();
    $employee_id = CoffeeConsumption::select('employee_id')->with('employee')->orderby('employee_id', 'asc')->distinct()->get();

          return view('admin.notifications.index', compact('years', 'months', 'employee_id'));
    }

    public function sendEmail(Request $request){

        $selectedYears = $request->input('year_of_order');
        $selectedMonths = $request->input('month_of_order');

        $query = CoffeeConsumption::with('employee');

        if ($selectedYears) {
            $query->whereIn('year_of_order', $selectedYears);
        }
    
        if ($selectedMonths) {
            $query->whereIn('month_of_order', $selectedMonths);
        }

        $results = $query->get();

        // dd($results);
        foreach ($results as $result) {
            
        try {
            Mail::to($result->employee->email)->queue(new NotificationEmail($result, $results));
            session()->flash('success', 'Emails were sent successfully');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
        } 
    }
        return redirect()->back();
    }

    // public function sendTestEmail(){
        
    //     $data['name'] = 'Noname';
    //     $data['date'] = now();
    //     // Mail::to('noname@stuba.sk')->send(new TestEmail($data));
    //     Mail::to('xruzickam@stuba.sk')->queue(new NotificationEmail($data));

    //     return redirect()->back();
    // }
}
