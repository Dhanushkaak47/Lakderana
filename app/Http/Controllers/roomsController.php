<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use App\Models\roomtype;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class roomsController extends Controller
{
    //
    public function opendashboard()
    {
        return view('reservation.res_dash');
    }

    public function openrooms()
    {
        # code...
        $room=roomtype::all();
        $hotelid = ((Auth::user()->hotelID));

        $roomsdata=DB::table('rooms')
        ->select('rooms.*','roomtypes.typename')
        ->join('roomtypes','roomtypes.id','=','rooms.roomtype')
        ->where('rooms.hotelID',$hotelid)
        ->get();
        return view('reservation.roomsmanage', compact('room','roomsdata'));
    }

    public function roomtypesave(Request $request)
    {
        # code...
        $datas = new roomtype;
        $datas->typename=$request->typename;
        $datas->price=$request->price;
        $datas->save();

        return redirect()->back()->with('message','success');
    }

    public function roomsave(Request $request)
    {
        $hotelid = ((Auth::user()->hotelID));
        $roomNo=$hotelid.('-').$request->roomno;
        
        # code...
        $datas = new rooms;
        $datas->roomNo=$roomNo;
        $datas->roomtype=$request->roomtype;
        $datas->hotelID=$hotelid;
        $datas->save();

        return redirect()->back()->with('message','success');
    }

    public function openres()
    {
        # code...
        $room=roomtype::all();

        

        return view('reservation.reservation', compact('room'));
    }

    public function getrooms($id)
    {
        # code...
        $hotelid = ((Auth::user()->hotelID));
        $states = DB::table("rooms")->where([["roomtype",$id],["status",1],["hotelID",$hotelid]])->pluck("roomNo","roomNo");
        // dd(json_encode($states));
        return json_encode($states);
    }

    public function roomreserve(Request $request)
    {
        # code...
        $data = new reservation;
        $data->roomtype=$request->roomtype;
        $data->roomNo=$request->roomno;
        $data->cus_id=$request->cusNo;
        $data->save();

        return redirect()->back()->with('message','success');
    }
}
