<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;

class DashboardController extends Controller
{
	
	

     public function index(){
        $user =  User::get();
        $order =  Order::get();
        $product =  product::get();

        return view('admin.dashboard' , compact('user' , 'order' , 'product'));
    }
    
}
