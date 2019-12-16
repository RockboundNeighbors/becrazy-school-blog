<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class ExamFirstRegisterController extends RegisterController
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Examination/list';

    function firstregisterForm(){
    	$usercount = User::count();
        //dump($usercount);
		if($usercount == 0){
			return view('auth.firstregister');
		}else{
            return redirect('Examination/top');
        }
    }
}