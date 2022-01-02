<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\empattendence;
use Illuminate\Support\Facades\DB;

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

        $attendence=empattendence::where('attendenceDate',$date)->get();

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
}
