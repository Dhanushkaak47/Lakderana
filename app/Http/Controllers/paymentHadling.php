<?php

namespace App\Http\Controllers;

use App\Models\res_service;
use Carbon\Carbon;
use App\Models\reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

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
        ->select('roomtypes.price','rooms.roomNo')
        ->join('roomtypes','roomtypes.id','=','rooms.roomtype')
        ->where('rooms.roomNo',$roomnumber)
        ->get();

        $date = reservation::where('id',$id)->get();

        $currmonth=Carbon::now();
        $lastMonth =  $currmonth->format('m-d-Y');
        

        $services=DB::table('res_services')
        ->select('res_services.qty','dinings.*')
        ->join('dinings','dinings.id','=','res_services.service')
        ->where('res_services.reservation_id',$id)
        ->get();

        

        $customer=DB::table('reservations')
        ->select('customer_data.*')
        ->join('customer_data','customer_data.id','=','reservations.cus_id')
        ->where('reservations.id',$id)
        ->get();

        // $pdf = PDF::loadView('pay.paymentdetail',compact('roomprice','services','date','customer','lastMonth'))->setOptions(['defaultFont' => 'sans-serif']);

        // $date = Carbon::today()->toDateString();
        // return $pdf->download('Invoice'.$date.'.pdf');

        return view('pay.paymentdetail', compact('roomprice','services','date','customer','lastMonth'));
        
    }
}
