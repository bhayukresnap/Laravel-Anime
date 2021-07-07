<?php

namespace App\Http\Controllers\main\Auth;

use App\Http\Controllers\main\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
class RegisterController extends Controller
{
    public function view(){
        return Auth::check() ? redirect(route('home')) : view('main.register');
    }


    public function authenticate(Request $request)
      {
          $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                //'password' => 'required|string|min:8|confirmed',
                //'password_confirmation' => 'required',
          ],
          [
                'name.required' => "Please provide your name!",
                'name.string' => 'Only alphabetic characters are allowed',
                'name.max' => 'Name must not be greater than 255 characters',
                'email.required' => "Please provide your email!",
                'email.email' => "Please check your email again!",
                'email.max' => 'Email must not be greater than 255 characters',
                'email.unique' => 'The email has been already taken!',
                'password.required' => 'Please provide password!',
                'password.min' => "Password must be at least 8 characters!",
                'password.confirmed' => "Password doesn't match!",
                'password_confirmation.required' => 'Please provide confirmation password!',

          ]
      );

          $data = [
              'name' => $request->name,
              'email' => $request->email,
              'password' => Hash::make($request->password),
          ];

          if(User::create($data)){
            return redirect(route('login'))->with('success', 'Your account has been created!');
          }
      }

}
