<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\emp_salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

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
        //$data = employee::where('emp_id',$id)->get();
        $employeesdata=DB::table('employees')
        ->select('employees.*','departments.departmentName','job_roles.rolename','hotel_chains.City')
        ->join('departments','departments.id','=','employees.departmentID')
        ->join('job_roles','job_roles.id','=','employees.jobRoleID')
        ->join('hotel_chains','hotel_chains.id','=','employees.workingPlace')
        ->where('employees.id',$id)
        ->get();
        

        $salaryData = emp_salary::where([['emp_id',$id],['pay_status',0]])->get();

        // $data = ['employeesdata' => $employeesdata,
        //     'salaryData' => $salaryData
        // ];

        // $pdf = PDF::loadView('financial.paysheet', $data);

        // return $pdf->download('invoice.pdf');


        return view('financial.paysheet', compact('employeesdata','salaryData'));

    }
}
