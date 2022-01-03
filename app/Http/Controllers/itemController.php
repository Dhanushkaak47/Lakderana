<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\baritem;
use App\Models\barsale;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class itemController extends Controller
{
    //page open
    public function saveitem(Request $request)
    {
        # code...
       $baritem=new baritem;

       $picname=time().'.'.$request->pictuename->extension();

       $request->pictuename->move(public_path('barpic'),$picname);

       $baritem->itemName=$request->itemname;
       $baritem->costPrice=$request->costprice;
       $baritem->qty=$request->qty;
       $baritem->total=$request->total;
       $baritem->sellprice=$request->sellprice;
       $baritem->catid=$request->category;
       $baritem->description=$request->description;
       $baritem->orderID=$request->orderid;
       $baritem->picture=$picname;
       $baritem->save();
       

       $orderid=order::select('id')->orderBy('created_at','DESC')->first()->id;

       $data=Category::all();

        //dd($data);

       return view('itemadd', compact('orderid','data'));
       
    }

    
    public function barsalepage()
    {
        # code...
        $baritem=baritem::all();
        return view('barsale', compact('baritem'));
    }

    public function liqview($id)
    {
        # code...
        $baritem=baritem::where('id', $id)->get();

        return view('liqview', compact('baritem'));
    }

    public function newsale(Request $request)
    {
        # code...
        $barsales=new barsale;

        $itemCode = $request->itemID;
        $quantity = $request->qty;

        $barsales->cus_id=$request->cid;
        $barsales->item_id=$request->itemID;
        $barsales->qty=$request->qty;
        $barsales->unit_price=$request->itemprice;
        $barsales->line_total=$request->linetotal;
        $barsales->save();

        $qtyupdate=DB::SELECT("UPDATE baritems SET qty=qty-$quantity where id=$itemCode");

        return redirect()->back()->with('message', 'Item Category added Successfully!');

    }

    public function search(Request $request)
    {
        # code...
        $name = $request->Search;
        $baritem=baritem::where('itemName', 'like','%'.$name.'%')->get();
        //->where([['add_rests.restaddress','like','%'. $request->location.'%'],['foodmanages.Itemname','like','%'.$request->item.'%'],['foodmanages.price','<=',$request->money]])
        return view('barsale', compact('baritem'));
    }
}
