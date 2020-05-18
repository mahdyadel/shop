<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::get();
    	return view('admin.orders.index' , compact('orders'));
    }//end of index

    public function confirm($id){
    	$order = Order::find($id);

    	$order->update(['status' => 1]);

    	session()->flash('msg' , 'Order has bean confirmed');

    	return redirect('admin/orders');
    }//end of confirm

    public function pending($id){

    	$order = Order::find($id);

    	$order->update(['status' => 0]);

    	session()->flash('msg' , 'Order has Been pending');

    	return redirect('admin/orders');
    }//end of pending

    public function show($id){
    	$order = Order::find($id);
    	return view('admin.orders.details' , compact('order'));
    }
 
 

}
