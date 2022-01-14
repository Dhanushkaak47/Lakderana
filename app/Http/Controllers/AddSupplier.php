<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function opendata()
    {
        # code...
        $data=Supplier::all();
        return view('suppliers', compact('data'));

    }

    public function delete($id)
    {
        # code...
        $updateWinner = DB::table('suppliers')->where('id', $id)->update([
            'status' => 0,
            
        ]);

        return redirect()->back()->with('remove','done');
    }

    public function up($id)
    {
        # code...
        $updateWinner = DB::table('suppliers')->where('id', $id)->update([
            'status' => 1,
            
        ]);

        return redirect()->back()->with('remove','done');
    }

    public function update($id)
    {
        # code...
        $data = supplier::where('id', $id)->first();
        return view('supplierupdate', compact('data'));
    }

    public function updatedata(Request $request)
    {
        # code...
        $id=$request->id;

        $data=supplier::find($id);
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastName;
        $data->contact_No=$request->contact;
        $data->email=$request->email;
        $data->companyname=$request->comname;
        $data->save();

        $data=Supplier::all();
        return view('suppliers', compact('data'));
    }
}