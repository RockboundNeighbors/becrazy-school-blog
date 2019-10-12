<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('Examination')->group(function(){
	//記事関連
	Route::get('titleaddform','ExamController@titleaddform');
	Route::post('titleadd','ExamController@titleadd');
	Route::get('titlelists','ExamController@titlelists');
	Route::get('titleedit{id}','ExamController@titleeditform');
	Route::post('titleedit','ExamController@titleedit');
	Route::post('titledelete','ExamController@titledelete');
	
	//カテゴリー関連
	Route::get('categorieslist','ExamController@categorieslist');
	Route::get('categoryaddform','ExamController@categoryaddform');
	Route::post('categoryedit','ExamController@categoryedit');
	Route::post('categorydelete','ExamController@categorydelete');

	//閲覧関連
	Route::get('top',function(){
		return view('Examination/top');
	});

	//ログイン機能とかもいれたんだったかな？
	Route::get('login', 'Auth\ExamLoginController@showLoginForm')->name('login');

	Route::post('login', 'Auth\ExamLoginController@login');
	Route::post('logout', 'Auth\ExamLoginController@logout')->name('logout');

	Route::get('register', 'Auth\ExamRegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'Auth\ExamRegisterController@register');
});



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');