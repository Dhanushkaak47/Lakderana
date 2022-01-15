<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\baritem;
use App\Models\barsale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class bardashboardController extends Controller
{
    //
    public function dashboardopen()
    {
        # code...
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

        $dailysale = barsale::selectRaw('dayname(created_at) as month, dayname(created_at) as day, sum(line_total) as total_sales')
            ->groupBy('month','day')
            ->orderByRaw('dayname(created_at) asc')
            ->get();

          //dd($dailysale);  
        // $mostsold = barsale::selectRaw('item_id, COUNT(*) AS magnitude')
        //     ->groupBy('item_id')
        //     ->get();
            
            $mostsold = DB::table('barsales')
            ->join('baritems', 'baritems.id', '=', 'barsales.item_id')
            ->groupBy('item_id','baritems.itemName')
            ->selectRaw('COUNT(*) AS magnitude, baritems.itemName as item_id')
            ->get();
        
            //dd($mostsold);

        return view('barDashboard', compact('thismonthincome','lasttmonthincome','thismonthOutcome','lasttmonthOutcome','sales','mostsold','dailysale'));

       
    }

    public function mostsold()
    {
        # code...
        $mostsold = DB::table('barsales')
            ->join('baritems', 'baritems.id', '=', 'barsales.item_id')
            ->groupBy('item_id','baritems.itemName')
            ->selectRaw('COUNT(*) AS magnitude, baritems.itemName as item_id')
            ->orderBy('magnitude','DESC')
            ->get();

        $pdf = PDF::loadView('barReport.most-sold',compact('mostsold'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('bar sales report.pdf');

        return view('barReport.most-sold', compact('mostsold'));

    }

    public function monthlyreport()
    {
        # code...
        $now = Carbon::now();
        $thismonth = $now->month;

        $monthname = Carbon::now()->format('M Y');

        // $sales = barsale::where('')
        $barsales=DB::table('barsales')
        ->select('barsales.*','baritems.itemName')
        ->join('baritems','baritems.id','=','barsales.item_id')
        ->whereMonth('barsales.created_at',$thismonth)
        ->get();

        


        $pdf = PDF::loadView('barReport.sales-report',compact('barsales','monthname'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('bar sales report'.$monthname.'.pdf');

        return view('barReport.sales-report', compact('barsales','monthname'));
    }

    public function inventory()
    {
        
        $inventory=baritem::all();

        $pdf = PDF::loadView('barReport.inventoryreport',compact('inventory'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('Inventory-BAR.pdf');

        return view('barReport.inventoryreport', compact('inventory'));

    }

    public function bardashboardfilter(Request $request)
    {
        # code...
        $dateone = $request->dateone;
        $datetwo = $request->enddate;

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

        $sales = barsale::whereBetween('barsales.created_at', [$dateone, $datetwo])
            ->selectRaw('year(created_at) as year, monthname(created_at) as month, sum(line_total) as total_sale')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) asc')
            ->get();

        $dailysale = barsale::whereBetween('barsales.created_at', [$dateone, $datetwo])
            ->selectRaw('dayname(created_at) as month, dayname(created_at) as day, sum(line_total) as total_sales')
            ->groupBy('month','day')
            ->orderByRaw('dayname(created_at) asc')
            ->get();

          //dd($dailysale);  
        // $mostsold = barsale::selectRaw('item_id, COUNT(*) AS magnitude')
        //     ->groupBy('item_id')
        //     ->get();
            
            $mostsold = DB::table('barsales')
            ->join('baritems', 'baritems.id', '=', 'barsales.item_id')
            ->groupBy('item_id','baritems.itemName')
            ->whereBetween('barsales.created_at', [$dateone, $datetwo])
            ->selectRaw('COUNT(*) AS magnitude, baritems.itemName as item_id')
            ->get();
        
            //dd($mostsold);

        return view('barDashboard', compact('thismonthincome','lasttmonthincome','thismonthOutcome','lasttmonthOutcome','sales','mostsold','dailysale'));
    }
}
