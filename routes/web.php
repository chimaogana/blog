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


Route::group(['namespace'=>'User'], function(){
    Route::get('/', 'HomeController@index');

    Route::get('post/{post?}', 'Postcontroller@post')->name('post');

    Route::get('post/category/{category}','HomeController@category')->name('category');
    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
  //vue routes
  Route::post('saveLike', 'PostController@saveLike');

  Route::post('getPosts', 'PostController@getAllPosts');



    
});



//admin route
Route::group(['namespace'=>'Admin'], function(){
    //Home route
Route::get('admin/home','HomeController@index')->name('admin/home');

//admin/user route
Route::resource('admin/user', 'UserController');
//post route
Route::resource('admin/post', 'PostController');
//admin/role route
Route::resource('admin/role', 'RoleController');
//admin/permission route
Route::resource('admin/Permission', 'PermissionController');
//category route
Route::resource('admin/category', 'CategoryController');
//tag route
Route::resource('admin/tag', 'TagController');

//Admin auth route
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\LoginController@login');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
