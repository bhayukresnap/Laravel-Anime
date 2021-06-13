<?php

namespace App\Http\Controllers\main\Auth;

use App\Http\Controllers\main\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function view(){
        return Auth::check() ? redirect(route('home')) : view('main.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 0])) {
            return redirect()->back();
        }

        return redirect()->back()->withErrors('Please check your email or password!');

    }

    public function logout(){
        return Auth::logout() ? null : redirect(route('login'));
    }
}
