<?php

namespace App\Http\Controllers\cms\Auth;

use App\Http\Controllers\cms\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
class LoginController extends Controller
{
    public function view(){
        return Auth::check() ? redirect(route('cms.home')) : view('cms.login');
    }

    public function authenticate(Request $request){
        $validate = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if($validate->passes()){
            return Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1]) 
            ? $this->ApiResponse('Success')
            : $this->ApiResponse('Please check your credentials', 406);
        }else{
            return $this->ApiResponse($validate->errors()->all(), 406);
        }

    }

    public function logout(){
        return Auth::logout() ? null : redirect(route('cms.login'));
    }
}
