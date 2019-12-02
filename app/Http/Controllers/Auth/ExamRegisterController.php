<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class ExamRegisterController extends RegisterController
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Examination/list';

    function firstregisterForm(){
    	$usercount = User::count();
        dump($usercount);
		if($usercount == 0){
			return view('auth.firstregister');
		}
    }

    function registerForm(){
    	$usercount = User::count();
   		if($usercount != 0){
			return view('auth.register');
		}
    }
}