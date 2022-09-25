<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\order_products;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $order =Orders::create([
            'user_id'=>request()->user()->id,
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'phone_number'=> $request->phone,
            'email_address'=> $request->email,
            'address'=> $request->address,
            'total_price'=>$request->total_price,
            'payment_method'=>$request->selector,
        ]);
        $emailSubject = 'New Order ID '.$order->id;
        $products = Products::all();
        $carts = Cart::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();

            foreach ($products as $product) {
                foreach ($carts as $cart) {
                    if ($product->id == $cart->products_id) {
                        $mail_products = $product;
                        order_products::create([
                            'orders_id'=>$order->id,
                            'products_id'=>$product->id,
                        ]);

                        $cart->delete();
                    }
                }
            }


            $products_mail=Products::all();
            $crt =order_products::where('orders_id', '=', $order->id)->pluck('products_id')->toArray();
            //dd($crt);

            foreach($crt as $c){
                $prds[] = Products::where('id',$c)->first();
            }

               
              
              //dd($prds);
       


            Mail::send('recipment_mail', array(
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'phone_number' => $request->get('phone'),
                'email_address' => $request->get('email'),
                'address' => $request->get('address'),
                'total_price' => $request->get('total_price'),
                'products' => $prds,
                'order_id' => $order->id,
            ), function($message) use ($request,$emailSubject){
                $message->from($request->email);
                $message->to('marinvictormvv@gmail.com', 'Admin')->subject($emailSubject);
            });
            Mail::send('recipment_mail', array(
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'phone_number' => $request->get('phone'),
                'email_address' => $request->get('email'),
                'address' => $request->get('address'),
                'total_price' => $request->get('total_price'),
                'products' => $prds,
                'order_id' => $order->id,
            ), function($message) use ($request,$emailSubject){
                $message->from($request->email);
                $message->to($request->get('email'), $request->get('first_name').$request->get('last_name'))->subject('Thanks for your order');
            });
            $orders = Orders::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();
            $order_products = order_products::all();
            return view('photo_app.my_orders', compact('products','orders','order_products'));
    }


             /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(){
        $products = Products::all();
        $orders = Orders::where('user_id','=',request()->user()->id)->take(PHP_INT_MAX)->get();
        $order_products = order_products::all();
        return view('photo_app.my_orders', compact('products','orders','order_products'));
    }

    
             /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function display(){
        $products = Products::all();
        $orders = Orders::all();
        $order_products = order_products::all();
        return view('photo_app.admin.orders.orders', compact('products','orders','order_products'));
    }

      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $order)
    {
        if($order->order_status == 0){
            $order->update([
                'order_status' => 1,
            ]);  
        }
        else{
            $order->update([
                'order_status' => 0,
            ]);  
        }

        $products = Products::all();
        $orders = Orders::all();
        $order_products = order_products::all();
        return view('photo_app.admin.orders.orders', compact('products','orders','order_products'));
    }

}

