<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationEmail;
use App\Models\CoffeeConsumption;
use App\Models\Employee;
// use Exception;

class NotificationController extends Controller
{
    public function index(){

    $years = CoffeeConsumption::select('year_of_order')->with('employee')->orderby('year_of_order', 'asc')->distinct()->get();
    $months = CoffeeConsumption::select('month_of_order')->with('employee')->orderby('month_of_order', 'asc')->distinct()->get();
    $employee_id = CoffeeConsumption::select('employee_id')->with('employee')->orderby('employee_id', 'asc')->distinct()->get();

          return view('admin.notifications.index', compact('years', 'months', 'employee_id'));
    }

    public function sendEmail(Request $request){


        $employee = Employee::with(['consumption', 'payment']);

        $selectedYears = $request->input('year_of_order');
        $selectedMonths = $request->input('month_of_order');
        $selectedEmployees = $request->input('employee_id');

        // $query = Employee::with('consumption', 'payment');

        $employee->whereHas('consumption', function ($query) use ($selectedYears, $selectedMonths, $selectedEmployees) {
         
        if ($selectedYears) {
            $query->whereIn('year_of_order', $selectedYears);
        }
    
        if ($selectedMonths) {
            $query->whereIn('month_of_order', $selectedMonths);
        }

        if ($selectedEmployees) {
            $query->whereIn('employee_id', $selectedEmployees);
        }
    });

        $results = $employee->get();
        
    //  dd($selectedMonths);

//          $filteredResults = [];

    
//         foreach ($results as $result) {
//             foreach ($result->consumption as $r) {

//             $monthOfOrder = $r->month_of_order;
//             if (in_array($monthOfOrder, $selectedMonths)) {
//                 // Ak sa hodnota zhoduje, pridajte riadok do výsledku
//                 $filteredResults[] = $monthOfOrder;
//         }
//     }
// }
//     dd($filteredResults);



//   POKUS MARTIN

//  $id_uzivatel = [];
$pocetK = [];

    foreach ($results as $res) {
        // $id_uzivatel[] = $res->id; 
        foreach ($res->consumption as $r) {
            if (in_array($r->year_of_order, $selectedYears)) {
            if (in_array($r->month_of_order, $selectedMonths)) {
                 $pocetK[] = $r->employee_id; 
                }
            }
    }
    }

    $pocetK = array_count_values($pocetK);
    // dd($pocetK[$res->id]);
    
    // $id_uzivatel;
    // $pocetK = array_count_values($pocetK);
    // dd($pocetK);

        foreach ($results as $result) {
                //  dd($result);
        try {
            Mail::to($result->email)->queue(new NotificationEmail($result, $selectedMonths, $selectedYears, $pocetK));
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
