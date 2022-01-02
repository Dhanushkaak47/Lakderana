<?php

namespace App\Http\Controllers;

use App\Models\jobRole;
use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class jbRoleController extends Controller
{
    public function save(Request $request)
    {
        # code...
        $data=new jobRole;
        $this->validate($request,[
            'rolename' => 'required|max:255',
            'department'=>'required',
        ]);

        $data->rolename=$request->rolename;
        $data->depID=$request->department;
        $data->save();

        return redirect()->back();
    }

    public function pageOpen()
    {
        # code...
        $departmentData = department::all();
        
        $rolesdata=DB::table('job_roles')
        ->select('job_roles.*','departments.departmentName')
        ->join('departments','departments.id','=','job_roles.depID')
        ->get();

        return view('HR.jbrole', compact('departmentData','rolesdata'));
    }
}
