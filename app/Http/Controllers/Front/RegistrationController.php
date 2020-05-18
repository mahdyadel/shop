<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;

class RegistrationController extends Controller
{
    public function index(){
    	return view('front.registration.index');
    }
    public function store(Request $request){
    	//validate the user
    	$request->validate([
    		'name'      => 'required',
    		'email'     => 'required|email',
    		'password'  => 'required|confirmed',
    		'address'   => 'required',

    	]);
    	//save the data

    	$user = User::create([
    		'name'       => $request->name,
    		'email'      => $request->email,
    		'password'   =>bcrypt($request->password),
    		'address'    => $request->address,

    	]);
    	//sign the user in 
    	auth()->login($user);

    	//Redirect to
    	return redirect('/');
    }
}
