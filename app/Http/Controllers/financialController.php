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
        $sales = barsale::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(line_total) as total_sale')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get();
        
        $barexpen = baritem::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(total) as total_expense')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get();
            
        $salariespending = DB::select("SELECT SUM(basic_salary) as basicsal, SUM(travel_allowence) as ta, SUM(over_time) as ot, SUM(weekend_bonus) as wb, SUM(other_bonus) as ob, SUM(nopay_leave) as nl, SUM(epf) as epf from emp_salaries where pay_status= 0");
        

        $resserviceincome = DB::table('res_services')
            ->join('dinings', 'dinings.id', '=', 'res_services.service')
            ->selectRaw('SUM(dinings.price * res_services.qty) as data')
            ->first();

        
        $bar = barsale::sum('line_total');
        
        $barexpenses = baritem::sum('total');

        
        return view('financial.dashboard', compact('sales','barexpen','salariespending','resserviceincome','bar','barexpenses'));
    }

    public function filter(Request $request)
    {
        # code...
        $dateone = $request->dateone;
        $datetwo = $request->enddate;

        $sales = barsale::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(line_total) as total_sale')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) asc')
        ->get();
        
        $barexpen = baritem::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(total) as total_expense')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get();
            
        $salariespending = DB::select("SELECT SUM(basic_salary) as basicsal, SUM(travel_allowence) as ta, SUM(over_time) as ot, SUM(weekend_bonus) as wb, SUM(other_bonus) as ob, SUM(nopay_leave) as nl, SUM(epf) as epf from emp_salaries where pay_status= 0");
        

        $resserviceincome = DB::table('res_services')
            ->join('dinings', 'dinings.id', '=', 'res_services.service')
            ->whereBetween('res_services.created_at', [$dateone, $datetwo])
            ->selectRaw('SUM(dinings.price * res_services.qty) as data')
            ->first();

        
        $bar = barsale::whereBetween('created_at', [$dateone, $datetwo])->sum('line_total');
        
        $barexpenses = baritem::whereBetween('created_at', [$dateone, $datetwo])->sum('total');

        
        return view('financial.dashboard', compact('sales','barexpen','salariespending','resserviceincome','bar','barexpenses'));

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

    public function filterbar(Request $request)
    {
        $dateone = $request->dateone;
        $datetwo = $request->enddate;
        # code...
       
        $outcomes = baritem::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(total) as total_sale')
        ->groupBy('year','month')
        ->whereBetween('created_at', [$dateone, $datetwo])
        ->orderByRaw('min(created_at) asc')
        ->get();

        $income = barsale::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(line_total) as total_sale')
        ->groupBy('year','month')
        ->whereBetween('created_at', [$dateone, $datetwo])
        ->orderByRaw('min(created_at) asc')
        ->get();

        $barsales=DB::table('barsales')
        ->select('barsales.*','baritems.itemName')
        ->whereBetween('barsales.created_at', [$dateone, $datetwo])
        ->join('baritems','baritems.id','=','barsales.item_id')
        ->get();
    
        //dd($mostsold);

    return view('financial.barincome', compact('outcomes','income','barsales'));
        
    }
}
