<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\barsale;
use App\Models\employee;
use App\Models\department;
use App\Models\hotelChain;
use Illuminate\Http\Request;
use App\Models\empattendence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //
    public function opendashboard()
    {
        $date = Carbon::today()->toDateString();

        $empcount = Employee::all()->count();

        $attendencetoday=empattendence::where('attendenceDate',$date)->count();

        $absent=$empcount-$attendencetoday;

        $dailyAVG=empattendence::groupBy('attendenceDate')->count();

        $now = Carbon::now()->subMonths();
        $Lastmonth = $now->month;
        //dd($Lastmonth);

        $now = Carbon::now();
        $thismonth = $now->month;

        //$thismonth =  barsale::whereMonth('created_at',$thismonth)->get();

        $thismonthincome = DB::select("SELECT SUM(line_total) as total from barsales where MONTH(created_at)=$thismonth");
        $lasttmonthincome = DB::select("SELECT SUM(line_total) as total from barsales where MONTH(created_at)=$Lastmonth");

        $thismonthOutcome = DB::select("SELECT SUM(total) as total from baritems where MONTH(created_at)=$thismonth");
        $lasttmonthOutcome = DB::select("SELECT SUM(total) as total from baritems where MONTH(created_at)=$Lastmonth");

        $sales = barsale::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(line_total) as total_sale')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get();

        // $mostsold = barsale::selectRaw('item_id, COUNT(*) AS magnitude')
        //     ->groupBy('item_id')
        //     ->get();
            
            $mostsold = DB::table('barsales')
            ->join('baritems', 'baritems.id', '=', 'barsales.item_id')
            ->groupBy('item_id','baritems.itemName')
            ->selectRaw('COUNT(*) AS magnitude, baritems.itemName as item_id')
            ->get();
        
            //dd($mostsold);

        return view('admin.dashboard', compact('empcount','attendencetoday','absent','thismonthincome','lasttmonthincome','thismonthOutcome','lasttmonthOutcome','sales','mostsold'));
    }

    public function usermanage()
    {
        # code...
        $data = employee::all();
        $hotel = hotelChain::all();
        return view('admin.usermanage', compact('data','hotel'));
    }

    public function getemp($id)
    {
        # code...
        $states = DB::table("employees")->where("departmentID",$id)->pluck("First_name","id");
        // dd(json_encode($states));
        return json_encode($states);
    }

    public function usersave(Request $request)
    {
        # code...
        
        $userdata =  new User;
        $hashed = Hash::make($request->password);
        
        $userdata->empID=$request->employee;
        $userdata->hotelID=$request->hotelname;
        $userdata->email=$request->email;
        $userdata->email_verified_at='2021-12-28 10:31:52';
        $userdata->password=$hashed;
        $userdata->user_level=$request->departmentname;
        $userdata->save();

        return redirect()->back()->with('message','done');
    }
}
