<?php

namespace App\Http\Controllers;

use App\Models\rooms;
use App\Models\roomtype;
use Carbon\Carbon;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class roomsController extends Controller
{
    //
    public function opendashboard()
    {

        $now = Carbon::now();
        $thismonth = $now->month;

        $monthlyres= reservation::all()->count();
        $running= reservation::where('payment',0)->count();

        $weekdays = reservation::selectRaw('year(created_at) as year, DAYNAME(created_at) as week, COUNT(id) as total_sale')
            ->groupBy('year','week')
            ->orderByRaw('min(created_at) asc')
            ->get();
       
       
        return view('reservation.res_dash', compact('monthlyres','running','weekdays'));
    }

    public function openrooms()
    {
        # code...
        $room=roomtype::all();
        $roomdata=rooms::all();
        $hotelid = ((Auth::user()->hotelID));

        $roomsdata=DB::table('rooms')
        ->select('rooms.*','roomtypes.typename')
        ->join('roomtypes','roomtypes.id','=','rooms.roomtype')
        ->where('rooms.hotelID',$hotelid)
        ->get();
        return view('reservation.roomsmanage', compact('room','roomsdata','roomdata'));
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
        $number=$request->roomno;
        $data->roomtype=$request->roomtype;
        $data->roomNo=$request->roomno;
        $data->cus_id=$request->cusNo;
        $data->save();

        $updateWinner = DB::table('rooms')->where('roomNo', $number)->update([
            'status' => 0,
            
        ]);

        return redirect()->back()->with('message','success');
    }

    public function researvationreport()
    {
        # code...
        $now = Carbon::now();
        $thismonth = $now->month;

        $resdata=DB::table('reservations')
        ->select('reservations.*','customer_data.cus_full_name','customer_data.cus_id','customer_data.mobile')
        ->join('customer_data','customer_data.id','=','reservations.cus_id')
        ->whereMonth('reservations.created_at', $thismonth)
        ->get();

        $pdf = PDF::loadView('reservation.resreport',compact('resdata'))->setOptions(['defaultFont' => 'sans-serif']);

        $date = Carbon::today()->toDateString();
        return $pdf->download('Resevation'.$date.'.pdf');

        return view('reservation.resreport', compact('resdata'));
    }

    public function roomType(Request $request)
    {
        # code...
        $updateWinner = DB::table('rooms')->where('roomNo', $request->roomname)->update([
            'roomtype' => $request->roomtype,
        ]);
        return redirect()->back()->with('message','success');
    }

    public function roomDelete($id)
    {
        # code...
        $updateWinner = DB::table('rooms')->where('roomNo', $id)->update([
            'status' => 0,
        ]);
        
        return redirect()->back()->with('message','success');
    }
}
