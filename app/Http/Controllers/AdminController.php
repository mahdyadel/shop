<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Validator;
use Illuminate\Support\facades\Auth;
use App\Admin;
use App\User;
use App\Order;
use App\product;



class AdminController extends Controller
{
    public function __construnt(){
        $this->middleware('guest:admin')->except('logout');
    }
    public function index(){
    	return view('admin.login');
    }
    public function store(Request $request){

    	//validate
    	$request->validate([

    		'email'  => 'required|email',
    		'password' => 'required',
    	]);

    	//log the user in
    	$credentials = $request->only('email' , 'password');

    		
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin/login');
        

    	}
    	//Session Message
    	session()->flash('msg' , 'You Have Bean Loged In');

    	//Redirect
    	return view('admin/dashboard');
    }
   public function logout(){
    auth()->guard('admin')->logout();

    session()->flash('msg' , 'You Have Bean Logged Out');

        return redirect('admin/login');
   }
}


