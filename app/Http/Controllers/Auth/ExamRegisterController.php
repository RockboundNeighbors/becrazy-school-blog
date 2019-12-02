<?php
namespace App\Http\Controllers\Auth;

class ExamRegisterController extends RegisterController
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Examination/list';

    function firstregisterForm(){
    	$usercount = User::table('users')->count();
		if($usercount == 0){
			return view('auth.firstregister');
		}
    }

    function registerForm(){
    	$usercount = User::table('users')->count();
   		if($usercount != 0){
			return view('auth.register');
		}
    }
}