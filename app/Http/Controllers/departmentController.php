<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;

class departmentController extends Controller
{
    public function save(Request $request)
    {
        # code...
        $data = new department;

        $this->validate($request,[
            'depname' => 'required|max:255',
            'contact' => 'required',
        ]);

        $data->departmentName=$request->depname;
        $data->contactNo=$request->contact;
        $data->save();

        return redirect()->back()->with('message','success');
    }

    public function pageopen()
    {
        $departmentData = department::all();
        return view('HR.department', compact('departmentData'));
    }
}
