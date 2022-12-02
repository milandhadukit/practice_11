<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    //
    public function addOrder()
    {   
        return view('admin.order.add_order');

    }

    public function storeOrder(Request $request)
    {

        // $validate= $request->validate([
        //     'address'=>'required',
        //     'name' => 'required',
        //     'mobile'=>'required|max:11|numeric',
        // ]);

        $order=new Order();
        $order->address=$request->address;
        $order->name=$request->name;
        $order->mobile=$request->mobile;
        $order->user_id =Auth::user()->id;
        $order->save();

        $cartitem=Cart::where('user_id',Auth::id())->get();
        
        foreach($cartitem as $item)
        {
            
            OrderItem::create([

                'order_id'=>$order->id,
                'product_id'=>$item->product_id,
                 
            ]);
            
        }

       

        return redirect()->route('cart')->with('success', 'Order  are Done ');
    }
}
