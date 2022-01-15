<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatAddController extends Controller
{
        public function addcat(Request $request){
            $addcategory=new Category;
            // validation
            $this->validate($request,[
                
                'catname'=>'required|max:50',
                'description'=>'required',
                
        

            ]);
            $addcategory->catname= $request->catname;
            $addcategory->description= $request->description;
            $addcategory->save();

            return redirect()->back()->with('message', 'Category Added Successfully!');
    }

    public function openpage()
    {
        # code...
        $data = Category::all();
       
        return view('catadd', compact('data'));
    }

    public function deletedata($id)
    {
        # code...
        $updateWinner = DB::table('categories')->where('id', $id)->update([
            'status' => 0,
        ]);
        
        return redirect()->back()->with('delete','success');
    }

    public function updatedelete($id)
    {
        # code...
        $updateWinner = DB::table('categories')->where('id', $id)->update([
            'status' => 1,
        ]);
        
        return redirect()->back()->with('message','success');
    }

}