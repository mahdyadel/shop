<?php

namespace App\Http\Controllers\Front;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Product;

class CartController extends Controller
{
    public function index(){

    	$products = Product::get();
    	return view('front.cart.index' , compact('products'));
    }

    public function store(Request $request){

    	$dubl = Cart::search(function($cartItem , $rowId) use($request){

    		return $cartItem->id === $request->id;
    	});

    	if($dubl->isNotEmpty()){

    		return redirect()->back()->with('msg' , 'item is already in cart');
    	}

	Cart::add($request->id , $request->name , 1 , $request->price)->associate('App\Product');

	return redirect()->back()->with('msg' , 'Item Has Bean added to cart');

    }
    public function destroy($id){

    	Cart::remove($id);

    	return redirect()->back()->with('msg' , 'Item has been removed from cart');

    }

    public function saveLater($id){

    	$item = Cart::get($id);

    	Cart::remove($id);

    	$dubl = Cart::instance()->search(function($cartItem , $rowId) use($id){

    		return $cartItem->id === $id;
    	});

    	if($dubl->isNotEmpty()){

    		return redirect()->back()->with('msg' , 'item is already Save For Later');
    	}


    	Cart::instance('saveForLater')->add($item->id , $item->name , 1 , $item->price)->associate('App\Product');

    	return redirect()->back()->with('msg' , 'Item has been Added from cart');
    }


    public function movecart($id){

    	$item = Cart::instance('saveForLater')->get($id);

    	Cart::instance('saveForLater')->remove($id);

    	$dubl = Cart::instance()->search(function($cartItem , $rowId) use($id){

    		return $cartItem->id === $id;
    	});

    	if($dubl->isNotEmpty()){

    		return redirect()->back()->with('msg' , 'item is already Save For Later');
    	}


    	Cart::instance('default')->add($item->id , $item->name , 1 , $item->price)->associate('App\Product');

    	return redirect()->back()->with('msg' , 'Item has been mmoved from cart');
    }
    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between: 1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors','Quantity must be between 1 and 5');
            return response()->json(['warning' => true]);
        }

        Cart::update($id, $request->quantity);

        session()->flash('msg','Quantity has been updated');

        return response()->json(['success' => true]);

    }


}



