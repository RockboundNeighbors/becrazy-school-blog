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

	Route::get('index','ExamAdminController@index');
	//記事関連 管理者が操作するところ
	Route::get('titleaddform','ExamAdminController@titleaddform');
	Route::post('titleadd','ExamAdminController@titleadd');
	Route::get('titlelists','ExamAdminController@titlelists');
	Route::get('deleted_lists','ExamAdminController@deleted_lists');
	Route::get('titleedit{id}','ExamAdminController@titleeditform');
	Route::post('titleedit','ExamAdminController@titleedit');
	Route::post('titledelete','ExamAdminController@titledelete');
	
	//カテゴリー関連
	Route::get('categorieslist','ExamAdminController@categorieslist');
	Route::get('categoryaddform','ExamAdminController@categoryaddform');
	Route::post('categoryedit','ExamAdminController@categoryedit');
	Route::post('categorydelete','ExamAdminController@categorydelete');

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