<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\empattendence;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class attendenceController extends Controller
{
    public function saveattendence(Request $request)
    {
        # code...
        $date = Carbon::today()->toDateString();
        $time = Carbon::now()->toTimeString();
        
        
        
        $attendData = new empattendence;
        
        $attendence=empattendence::where([['attendenceDate',$date],['empID',$request->empID]])->count();

        if($attendence==0){
            $attendData->empID=$request->empID;
            $attendData->in_time=$time;
            $attendData->out_time=$time;
            $attendData->attendenceDate=$date;
            $attendData->save();
            return redirect()->back();
        }
        else{
            $outtime = DB::table('empattendences')->where([['attendenceDate',$date],['empID',$request->empID]])->update([
                'out_time' => $time,
                
            ]);
            return redirect()->back();
        }
    }

    public function pageopen()
    {
        # code...
        $date = Carbon::today()->toDateString();

        //$attendence=empattendence::where('attendenceDate',$date)->get();
       
        $attendence=DB::table('empattendences')
        ->select('empattendences.*','employees.First_name','employees.Last_name')
        ->join('employees','employees.id','=','empattendences.empID')
        ->where('empattendences.attendenceDate',$date)
        ->get();
        
        
        return view('HR.attendenceManage', compact('attendence'));
    }

    public function HRattendence(Request $request)
    {
        # code...
        $attendData = new empattendence;
        $attendData->empID=$request->empID;
        $attendData->in_time=$request->intime;
        $attendData->out_time=$request->outTime;
        $attendData->attendenceDate=$request->date;
        $attendData->save();
        return redirect()->back();
    }

    public function export()
    {
        # code...
        $date = Carbon::today()->toDateString();
        

        //$attendence=empattendence::where('attendenceDate',$date)->get();
       
        $attendence=DB::table('empattendences')
        ->select('empattendences.*','employees.First_name','employees.Last_name')
        ->join('employees','employees.id','=','empattendences.empID')
        ->where('empattendences.attendenceDate',$date)
        ->get();
        
        $pdf = PDF::loadView('HR.attendence-report',compact('attendence','date'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('Daily Attendence'.$date.'.pdf');

        // Excel::create('New file', function($excel) {

        //     $excel->sheet('New sheet', function($sheet) {
        
        //         $sheet->loadView('HR.attendence-report',compact('attendence','date'))->setOptions(['defaultFont' => 'sans-serif']);
        //         return $sheet->download('Daily Attendence.pdf');
        //     });
        
        // });

        return view('HR.attendence-report', compact('attendence','date'));
    }
}
