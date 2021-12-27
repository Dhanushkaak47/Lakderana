<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class AddSupplier extends Controller
{
    public function addsup(Request $request){
        //dd($request);
        $addsupplier=new Supplier;
        // validation
        $this->validate($request,[
            
            'firstname'=>'required|max:50',
            'lastname'=>'required',
            'contactno'=>'required',
            'email'=>'required',
            'company'=>'required|max:180|min:2',
            
    
            

        ]);
       
        $addsupplier->firstname= $request->firstname;
        $addsupplier->lastname= $request->lastname;
        $addsupplier->contact_No= $request->contactno;
        $addsupplier->email= $request->email;
        $addsupplier->companyname= $request->company;
        $addsupplier->save();

        return redirect()->back()->with('message', 'Supplier Added Successfully!');
}


}