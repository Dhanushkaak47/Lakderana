<?php

namespace App\Http\Controllers;

use App\Models\dining;
use App\Models\res_service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class serviceController extends Controller
{
    //
    public function opendashboard()
    {
        # code...
        return view('services.servicedashboard');
    }

    public function servicemanage()
    {
        # code...
        $services = dining::all();
        return view('services.servicemanage', compact('services'));
    }

    public function saveservice(Request $request)
    {
        # code...
        $data =  new dining;
        $data->name=$request->name;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();

        return redirect()->back()->with('message', 'done');
    }

    public function servicepageopen($id, $roomno)
    {
        # code...
        $service = dining::all();
        
        $served=DB::table('res_services')
        ->select('dinings.*','res_services.qty')
        ->join('dinings','dinings.id','=','res_services.service')
        ->where('res_services.reservation_id',$id)
        ->get();

        return view('services.serve', compact('id','roomno','service','served'));
    }

    public function serve(Request $request)
    {
        # code...
        $data = new res_service;
        $data->reservation_id=$request->rsid;
        $data->service=$request->service;
        $data->qty=$request->qty;
        $data->save();

        return redirect()->back()->with('message','success');
    }
}
