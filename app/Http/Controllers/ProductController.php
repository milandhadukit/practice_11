<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\DB;




class ProductController extends Controller
{
    //
    public function addProduct()
    {

        return view ('admin.product.addProduct');
    
    }

    public function storeProduct(Request $request)
    {
        $images= $request->file('thumb_image');
        $filenames = $images->getClientOriginalName();
        $images->move(public_path().'/full/',$filenames);
        $image_resolustion = Image::make(public_path().'/full/'.$filenames);
        $image_resolustion ->fit(200, 200);
        $image_resolustion->save(public_path('thumb_image/' .$filenames));



        $image= $request->file('cover_image');
        $filename = $image->getClientOriginalName();
        //Fullsize
        $image->move(public_path().'/full/',$filename);
        $image_resize = Image::make(public_path().'/full/'.$filename);
        // $image_resize->fit(800, 1020);
        $image_resize ->resize(800, 1020);
        $image_resize->save(public_path('Cover_Images/' .$filename));

        $product= new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->thumb_image = $filenames;
        $product->cover_image = $filename;
        $product->save();
        return redirect()->route('admin.addProducts');
    }


    public function productList(Request $request)
    {
        $query=Product::query();
        $categories=Category::all();

        if($request->ajax())
        {
            $productList=$query->where(['category_id'=>$request->category])->get();
            return response()->json(['productList'=>$productList]);

        
        }
        $productList=$query->get();



        
        $min_price = Product::min('price');
        $max_price = Product::max('price');
        $filter_min_price = $request->min_price;
        $filter_max_price = $request->max_price;
        if($filter_min_price && $filter_max_price){
            if($filter_min_price >0 && $filter_max_price >0)
            {
            $products = Product::select('product_name','price')->whereBetween('price',[$filter_min_price,$filter_max_price])->get();
          }
        }  
        else{
            $products = Product::select('product_name','price')->get();
        }
        return view('admin.product.producList',compact('productList','categories','products','min_price','max_price','filter_min_price','filter_max_price'));
    }

    
}

    