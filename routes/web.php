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
	Route::get('title_addform','ExamAdminController@titleaddform');
	Route::post('title_add','ExamAdminController@titleadd');
	Route::get('title_lists','ExamAdminController@titlelists');
	Route::get('deleted_lists','ExamAdminController@deleted_lists');
	Route::get('title_edit{id}','ExamAdminController@title_editform');
	Route::post('title_edit','ExamAdminController@title_edit');
	Route::post('title_delete','ExamAdminController@titledelete');
	
	//カテゴリー関連
	Route::get('category_lists','ExamAdminController@category_lists');
	Route::post('category_add','ExamAdminController@category_add');
	Route::get('category_addform','ExamAdminController@category_addform');
	Route::get('category_edit{id}','ExamAdminController@category_editform');
	Route::post('category_edit','ExamAdminController@category_edit');
	Route::post('category_delete','ExamAdminController@categorydelete');
	Route::get('tag_lists','ExamAdminController@tag_lists');

	Route::get('tag_edit{id}','ExamAdminController@tag_editform');
	Route::post('tag_edit','ExamAdminController@tag_edit');
	Route::post('tag_delete','ExamAdminController@tag_delete');
	

	//閲覧関連
	Route::get('top','ExamController@top');
	Route::get('article_list','ExamController@article');
	Route::get('tag_list','ExamController@tag');
	Route::get('tag_article_list{id}','ExamController@tag_article');
	Route::get('category_list','ExamController@category');
	Route::get('category_article_list/{name}','ExamController@category_article_list');
	Route::get('tag_article_list/{name}','ExamController@tag_article_list');
	Route::get('view_article/{slug}','ExamController@view_article');

	//ログイン機能とかもいれたんだったかな？
	Route::get('login', 'Auth\ExamLoginController@showLoginForm')->name('login');

	Route::post('login', 'Auth\ExamLoginController@login');


	Route::post('logout', 'Auth\ExamLoginController@logout')->name('logout');

	Route::get('firstregister', 'Auth\ExamFirstRegisterController@firstregisterForm')->name('register');
	
	Route::post('firstregister','Auth\RegisterController@register');

	Route::get('register','Auth\ExamRegisterController@registerForm')->name('register');
	Route::post('register','Auth\RegisterController@register');

	Route::get('changepassword','ExamAdminController@changePasswordForm');
	Route::post('changepassword','ExamAdminController@changePassword')->name('changePassword');

});



//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');