<?php

namespace App\Http\Controllers;

use App\Models\baritem;
use App\Models\barsale;
use App\Models\employee;
use App\Models\emp_salary;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;


class financialController extends Controller
{
    //
    public function opendashboard()
    {
        # code...
        return view('financial.dashboard');
    }

    public function paysheet()
    {
        # code...
        
        $empData=DB::table('emp_salaries')
        ->select('employees.*')
        ->join('employees','employees.id','=','emp_salaries.emp_id')
        ->get();

        return view('financial.emp_paysheet', compact('empData'));
    }

    public function paysheetview($id)
    {
        # code...
        $employeesdata=DB::table('employees')
        ->select('employees.*','departments.departmentName','job_roles.rolename','hotel_chains.City')
        ->join('departments','departments.id','=','employees.departmentID')
        ->join('job_roles','job_roles.id','=','employees.jobRoleID')
        ->join('hotel_chains','hotel_chains.id','=','employees.workingPlace')
        ->where('employees.id',$id)
        ->get();
        

        $salaryData = emp_salary::where([['emp_id',$id],['pay_status',0]])->get();


        //$pdf = PDF::loadView('financial.paysheet', compact('employeesdata','salaryData'));

        $pdf = PDF::loadView('financial.paysheet',compact('employeesdata','salaryData'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('paysheet'.$id.'.pdf');


        return view('financial.paysheet', compact('employeesdata','salaryData'));

    }

    public function barreport()
    {
        # code...

            $outcomes = baritem::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(total) as total_sale')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get();

            $income = barsale::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(line_total) as total_sale')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get();

            $barsales=DB::table('barsales')
            ->select('barsales.*','baritems.itemName')
            ->join('baritems','baritems.id','=','barsales.item_id')
            ->get();
        
            //dd($mostsold);

        return view('financial.barincome', compact('outcomes','income','barsales'));
    }
}
