<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Image;
use App\Models\Product_Image;

class ProductImageController extends Controller
{
    //
    public function add_Product_image()
    {
        $products=Product::all();
       
        return view('admin.product.addProduct_Image',compact('products'));
    }

    public function store_Product_Image(Request $request)
    {
        $img= $request->file('image');
        $folder_name = $img->getClientOriginalName();
        $img->move(public_path().'/full/',$folder_name);
        $image_resize = Image::make(public_path().'/full/'.$folder_name);
        // $image_resize->fit(800, 1020);
        // $image_resize ->resize(800, 1020);
        $image_resize->save(public_path('Product_Image/' .$folder_name));


        $product_image= new Product_Image();
        $product_image->product_id=$request->product_id;
        $product_image->image = $folder_name;
        $product_image->save();
        return redirect()->route('admin.add-product-image');
    }
}
