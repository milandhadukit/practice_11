<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    //
    public function addCategories()
    {
        $category_sub=Category::all();
        return view('admin.category.addCategory',compact('category_sub'));
    }
    public function storeCategory(Request $request)
    {
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->parent_id=$request->parent_id;
        $category->save();
        return  redirect()->route('admin.addCategory');
    } 

}
