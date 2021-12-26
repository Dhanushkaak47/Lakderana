<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Models\department;
use App\Models\hotelChain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class employeeController extends Controller
{
    public function pageopen()
    {
        # code...
        $departmentData = department::all();
        $hotelchain = hotelChain::all();
       

        $employees=DB::table('employees')
        ->select('employees.*','departments.departmentName','job_roles.rolename','hotel_chains.City')
        ->join('departments','departments.id','=','employees.departmentID')
        ->join('job_roles','job_roles.id','=','employees.jobRoleID')
        ->join('hotel_chains','hotel_chains.id','=','employees.workingPlace')
        ->get();

        return view('HR.Employees', compact('departmentData','hotelchain','employees'));
    }

    public function getRole($id)
    {
        # code...
        $states = DB::table("job_roles")->where("depID",$id)->pluck("rolename","id");
            // dd(json_encode($states));
            return json_encode($states);
    }

    public function empsave(Request $request)
    {
        # code...
        $empdata=new Employee;
        $this->validate($request,[
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'address' => 'required|max:255',
            'contact' => 'required|max:255',
            'Email' => 'required|max:255',
            'hiredate' => 'required|max:255',
            'department' => 'required|max:255',
            'jobrole' => 'required|max:255',
            'Assign' => 'required|max:255',
            'basicSal' => 'required|max:255',
            'travelAloow' => 'required|max:255',
        ]);

        $emppicname=time().'.'.$request->profilePic->extension();

        $request->profilePic->move(public_path('empPictures'),$emppicname);

        $empdata->First_name=$request->firstname;
        $empdata->Last_name=$request->lastname;
        $empdata->DOB=$request->dob;
        $empdata->Address=$request->address;
        $empdata->contact=$request->contact;
        $empdata->email=$request->Email;
        $empdata->Hire_date=$request->hiredate;
        $empdata->departmentID=$request->department;
        $empdata->jobRoleID=$request->jobrole;
        $empdata->emp_pic=$emppicname;
        $empdata->workingPlace=$request->Assign;
        $empdata->basic_salary=$request->basicSal;
        $empdata->travel_allow=$request->travelAloow;
        $empdata->save();

        return redirect()->back();
    }
}
