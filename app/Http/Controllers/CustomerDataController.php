<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerData;

class CustomerDataController extends Controller
{
    public function index()
    {
        return view('customer/index');
    }
    
    public function search(Request $request)
    {
        try {
            $id = $request->input('customer');
    
        $request->validate([
            'customer'          => 'required',
        ]);
  
        $userRecord = CustomerData::where('cus_id', $id)->first();
       
        return response()->json(['success'=>$userRecord]);
        } catch (\Throwable $th) {
            //throw $th;
        }
       
    }
}
