<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use App\Models\User;
class LoginController extends Controller
{
   public function getLogin(){
   	if(!Auth::check()){
   		return view('admin.module.login.login');
    }else{
        	return redirect('ad_mrlinh');
   	}
   }
   public function postLogin(LoginRequest $request){
   	$login = [
   				'username' => $request->username, 
   			  	'password' => $request->password,
   			  	'level'=>1
   			 ];
        if (Auth::attempt($login)) {
            return redirect('ad_mrlinh');
        }else{
        	//return redirect()->back();
          $errors = new MessageBag(['errorlogin' => 'Username or Password is not correct']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
   }
   public function getLogout(){
   		Auth::logout();
   		return redirect()->route('login');
   }
}
