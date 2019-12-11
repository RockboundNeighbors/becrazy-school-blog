<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class ExamRegisterController extends RegisterController
{

    public function __construct(){
        $this->middleware("auth");
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/Examination/list';



    function registerForm(){
        return view('auth.register');
    }
}