<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //Admin Login page
    public function show(){
        return view('admin.login');
    }
    public function process(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->guard('admin')->attempt($request->only('username', 'password'))){
            return back()->with('message','Invalid Credentials');
        }
        return redirect('/admin/dashboard');
    }

}
