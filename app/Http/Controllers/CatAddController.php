<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
}