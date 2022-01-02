<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\baritem;

class itemController extends Controller
{
    //page open
    public function saveitem(Request $request)
    {
        # code...
       $baritem=new baritem;

       $baritem->itemName=$request->itemname;
       $baritem->costPrice=$request->costprice;
       $baritem->qty=$request->qty;
       $baritem->total=$request->total;
       $baritem->sellprice=$request->sellprice;
       $baritem->catid=$request->category;
       $baritem->description=$request->description;
       $baritem->orderID=$request->orderid;
       $baritem->save();
       


    }
}
