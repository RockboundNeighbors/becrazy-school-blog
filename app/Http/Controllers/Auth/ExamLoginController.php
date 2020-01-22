<?php
namespace App\Http\Controllers\Auth;

class ExamLoginController extends LoginController
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/Examination/title_lists';
}