<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        return $this->middleware('guest');
    }

    //Show the login page
    public function show(){
        return view('users.login');
    }
    //Process the Details from the UI
    public function process(Request $request){
        $request->validate([
            'employee_id' => 'required',
            'password' => 'required',
        ]);
        if(!auth()->attempt($request->only('employee_id','password'))){
            return back()->with('message', 'Invalid Login Credentials');
        }
        return redirect('/');
    }
}
