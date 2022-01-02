<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Category;


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

        $data=Category::all();

        //dd($data);

        return view('itemadd', compact('orderid','data'));

    
}
}