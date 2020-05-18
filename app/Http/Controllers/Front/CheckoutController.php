<?php

namespace App\Http\Controllers\Front;

use App\OrderItems;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use App\Order;
use Carbon\Carbon;
use Stripe\Error\Card;


class CheckoutController extends Controller
{
 	public function index(){
 		return view('front.checkout.index');
 	}
 	 public function store(Request $request) {

 	 	// dd($request->all());
 	 	$contents = Cart::instance('default')->content()->map(function($item) {
            return $item->model->name . ' ' . $item->qty;
        })->values()->toJson();

 	 	try{
 	 		 \Stripe\Stripe::setApiKey('sk_test_DXfk1NNHxFSIwpDeFFi3SheI00Qrp2yffw');
               // dd($contents = $request->stripeToken);

       $charge =  \Stripe\Charge::create ([


 	 			'amount'       => Cart::total()*100,
 	 			'currency'     =>  'USD',
 	 			'source'       => $request->stripeToken,
 	 			'description'  => 'Some Text',
 	 			'metadata'      => [

 	 				// 'contents' => $contents,
 	 				// 'quantity' => Cart::instance('default')->count()
 	 			]
 	 		]);
       // dd($charge);
 	 			//success
 	 			return redirect()->back()->with('msg' , 'Success Thank you ');

 	 	}catch(Exception $e){

 	 	}
 }
}