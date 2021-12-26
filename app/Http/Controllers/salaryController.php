<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empattendence;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class salaryController extends Controller
{
    public function pageopen()
    {
        # code...
        //$attendence=empattendence::where()->get();

        // $attendence=DB::table('empattendences')
        // ->select('empID','SEC_TO_TIME(SUM(TIME_TO_SEC( SUBTIME(out_time,in_time))))')
        // ->groupBy('empID')
        // ->get();

        $now = Carbon::now()->subMonths();
        $month = $now->month;

        //dd($month);

        $actTime = DB::select("SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( SUBTIME(empattendences.out_time,empattendences.in_time) ) ) ) AS timeSum  FROM empattendences WHERE MONTH(attendenceDate)=$month  GROUP BY empID");
        
        $attendence=DB::SELECT("SELECT empID, SUM(HOUR(in_time)) AS sumofin, SUM(HOUR(out_time)) AS sumofout from empattendences WHERE MONTH(attendenceDate)=$month GROUP BY empID");
       // dd($attendence);

        $hour = date('H');
        //dd($attendence);
        $currmonth=Carbon::now();
        $lastMonth =  $currmonth->subMonth()->format('Y M');
        //dd($lastMonth);
        return view('HR.salaryManage', compact('attendence','lastMonth','actTime'));

        
    }

    public function makeSalary($id, $hours)
    {
        
        # code...
        //$hour = Carbon::createFromFormat($hours)->format('H');
        $time = $hours;

        $employees=DB::table('employees')
        ->select('employees.*','departments.departmentName','job_roles.rolename','hotel_chains.City')
        ->join('departments','departments.id','=','employees.departmentID')
        ->join('job_roles','job_roles.id','=','employees.jobRoleID')
        ->join('hotel_chains','hotel_chains.id','=','employees.workingPlace')
        ->where('employees.id',$id)
        ->get();

        //dd($employees);
        $empSal=DB::table('employees')->select('basic_salary')->where('id',$id)->first();

        // $data=$empSal*10;
        // if($time<=180){
        //     //$daylySal = $empSal/180;
        //     //$monthly = $daylySal*$time;
        //     dd($data);
        // }

        $currmonth=Carbon::now();
        $lastMonth =  $currmonth->subMonth()->format('Y M');

        return view('HR.employeeSal', compact('employees','time','lastMonth'));

        
    }
}
