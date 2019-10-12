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
}