<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\employee;
use App\Models\department;
use App\Models\hotelChain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //
    public function opendashboard()
    {
        return view('admin.dashboard');
    }

    public function usermanage()
    {
        # code...
        $data = employee::all();
        $hotel = hotelChain::all();
        return view('admin.usermanage', compact('data','hotel'));
    }

    public function getemp($id)
    {
        # code...
        $states = DB::table("employees")->where("departmentID",$id)->pluck("First_name","id");
        // dd(json_encode($states));
        return json_encode($states);
    }

    public function usersave(Request $request)
    {
        # code...
        
        $userdata =  new User;
        $hashed = Hash::make($request->password);
        
        $userdata->empID=$request->employee;
        $userdata->hotelID=$request->hotelname;
        $userdata->email=$request->email;
        $userdata->email_verified_at='2021-12-28 10:31:52';
        $userdata->password=$hashed;
        $userdata->user_level=$request->departmentname;
        $userdata->save();

        return redirect()->back()->with('message','done');
    }
}
