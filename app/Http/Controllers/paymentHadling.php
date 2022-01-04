<?php

namespace App\Http\Controllers;

use App\Models\res_service;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paymentHadling extends Controller
{
    //
    public function openpage()
    {
        # code...
        //$data = reservation::where('payment',0);

        $data=DB::table('reservations')
        ->select('reservations.*','customer_data.cus_id','customer_data.cus_full_name','customer_data.mobile')
        ->join('customer_data','customer_data.id','=','reservations.cus_id')
        ->where('reservations.payment',0)
        ->get();

        return view('pay.payment', compact('data'));
    }

    public function paymentdetails($id, $roomnumber)
    {
        # code...
        $roomprice=DB::table('rooms')
        ->select('roomtypes.price')
        ->join('roomtypes','roomtypes.id','=','rooms.roomtype')
        ->where('rooms.roomNo',$roomnumber)
        ->get();

        $date = res_service::where('id',$id)->get();

        $services=DB::table('res_services')
        ->select('res_services.*','dinings.price')
        ->join('dinings','dinings.id','=','res_services.service')
        ->where('res_services.reservation_id',$id)
        ->get();

        dd($date);
    }
}
