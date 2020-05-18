<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{

	public function  __construct(){
		
		$this->middleware('guest')->except('logout');
	}

    public function index(){
    	return view('front.registration.index');
    }
    public function store(Request $request){
    	//validate
    	$request->validate([
    		'email'   => 'required|email',
    		'password'  => 'required|confirmed',
    	]);
    	$data = request(['email' , 'password']);
    	if(! auth()->attempt($data)){
    		return back()->withErrors([
    			'messag'  => 'Warning Credentials Pleas Try Again'
    		]);
    	}
    	return redirect('/user/profile');
    }
    public function logout(){
    	auth()->logout();

    	session()->flash('msg' , 'You Have Bean  Logged Out Successfuly');

    	return redirect('/user/login');
    }
}
