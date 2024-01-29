<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\SimpleExcel\SimpleExcelWriter;

class AccountManagementController extends Controller
{
    public function account()
    {
        $managements = Employee::with(['consumption', 'payment'])->orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->paginate(10);
       
        return view('admin.accountManagement.index')->with('managements', $managements);
    }

    public function exportPDF()
    {
        $managements = Employee::with(['consumption', 'payment'])->orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->get();
        $array = ['title' => 'Account Management'];
        $data = compact('managements', 'array');
        $pdf = PDF::loadView('admin.accountManagement.pdf', $data);
        // $pdf = PDF::loadView('admin.accountManagement.pdf', $data)->setPaper('a4', 'landscape');
        // $pdf = PDF::loadView('admin.accountManagement.pdf', $data)->setOption(['defaultFont' => 'DejaVu Sans']);

        //return $pdf->download('accounManagement.pdf');
        return $pdf->stream('accounManagement.pdf');
    }

    public function exportXLS()
    {
        $csv = SimpleExcelWriter::streamDownload('accounts.csv');
        $accounts = Employee::with(['payment', 'consumption'])->orderBy('last_name', 'asc')->orderBy('first_name', 'asc')->get()->toArray();

        $csv->addRow([
            'Employee',
            'Income (€)',
            'Expenses (€)',
            'Difference (€)',
        ]);

        foreach ($accounts as $m) {
            $fullName = $m['last_name'] . ' ' . $m['first_name'];
            $totalIncome = collect($m['payment'])->sum('income');
            $coffeeCost = count($m['consumption']) * 0.3;
            $difference = $totalIncome - $coffeeCost;

            $csv->addRow([
                $fullName,
                $totalIncome,
                $coffeeCost,
                $difference,
            ]);
        }

        $csv->toBrowser();    
    }
}
