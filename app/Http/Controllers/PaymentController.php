<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Exception;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::withTrashed()->with('employee')->orderBy('date_of_income', 'desc')->paginate(10);

        return view('admin.payments.index')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $create = true;

        return view('admin.payments.upsert')->with('create', $create)->with('employeeList', $this->employeeList());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'employee_id'                   => 'required|integer',
            'income'                        => 'required|numeric|regex:/^\d+(\.\d{2})?$/',
            'date_of_income'                => 'required|date',
          ];
          $validated = $request->validate($rules);
  
          try {
              $d = Payment::create([
                  'employee_id'              => $request['employee_id'],
                  'income'                   => $request['income'],
                  'date_of_income'           => $request['date_of_income'],
              ]);
              session()->flash('success', 'Payment was successfully created.');
              return redirect()->route('payments.index');
          } catch (Exception $e) {
              session()->flash('failure', $e->getMessage());
              return redirect()->back()->withInput();
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        $create = false;

        return view('admin.payments.upsert')->with('payment', Payment::find($payment->id))->with('create', $create)->with('employeeList', $this->employeeList());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $rules = [
            'employee_id'                   => 'required|integer',
            'income'                        => 'required|numeric|regex:/^\d+(\.\d{2})?$/',
            'date_of_income'                => 'required|date',
        ];
        $validated = $request->validate($rules);

        $p = Payment::find($payment->id);
        $p->employee_id                      = $request->employee_id;
        $p->income                           = $request->income;
        $p->date_of_income                   = $request->date_of_income;

        try {
            $p->save();
            session()->flash('success', 'Payment was successfully updated.');
            return redirect()->route('payments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        try {
            $payment->delete();
            session()->flash('success', 'Payment was successfully deleted');
            return redirect()->route('payments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }  
    }

    public function forceDestroy($id)
    {
        try {
            Payment::withTrashed()->find($id)->forceDelete();
            session()->flash('success', 'Payment was permanently deleted');
            return redirect()->route('payments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }
    }

    public function restore($id)
    {
        try {
            Payment::withTrashed()->find($id)->restore();
            session()->flash('success', 'Payment has been restored');
            return redirect()->route('payments.index');
        } catch (Exception $e) {
            session()->flash('failure', $e->getMessage());
            return redirect()->back();
        }
    }
}
