<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function loginPage(){

        if(Auth::check()){
            return redirect()->route('landing');
        }
    
        return view('pages.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
    
        // Attempt to log in
        if (Auth::attempt($credentials)) {
            return redirect()->route('landing'); // Redirect to landing page if successful
        }
    
        return back()->with('error', 'Invalid credentials'); // Show error message
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
    
}
