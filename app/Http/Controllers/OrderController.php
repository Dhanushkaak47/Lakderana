<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;


class OrderController extends Controller
{
    public function addorder(Request $request){
        $addorder=new order;
        // validation
        $this->validate($request,[
            
            'supname'=>'required|max:50',
            
    
            

        ]);
        $addorder->supid = $request->supname;
        $addorder->save();
        $orderid=order::select('id')->orderBy('created_at','DESC')->first()->id;
        return view('itemadd', compact('orderid'));

    
}
}