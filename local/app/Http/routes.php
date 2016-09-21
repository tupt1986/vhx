<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
/*
|--------------------------------------------------------------------------
| Application Routes Users
|--------------------------------------------------------------------------
*/
//list user
Route::get('/users', [
    'as'=>'users',
    'uses' => 'UserController@index',
    'middleware'=>'roles',
    'roles'=>['Admin'],
]);
//create user
Route::get('/users/create',[
    'uses'=>'UserController@create',
    'as'=>'user.create',
    'middleware'=>'roles',
    'roles'=>['Admin'],

]);
Route::post('/users/create',[
    'uses'=>'UserController@store',
    'as'=>'user.store',
    'middleware'=>'roles',
    'roles'=>['Admin'],

]);
//Gan quyen truy cap
Route::post('/users/assignroles',[
    'uses' => 'UserController@assignRoles',
    'as' => 'user.assignroles',
    'middleware'=>'roles',
    'roles'=>['Admin'],
]);
//view thong tin update user
Route::get('/users/{id_user}',[
    'uses'=>'UserController@edit',
    'as'=>'user.update',
    'middleware'=>'roles',
    'roles'=>['Admin'],
])->where(['id_user','[0-9]+']);
//update user
Route::patch('/users/{id_user}',[
    'uses'=>'UserController@update',
    'as'=>'user.update',
    'middleware'=>'roles',
    'roles'=>['Admin'],
]);
//xoa user
Route::delete('/users/{id_user}',[
    'uses'=>'UserController@destroy',
    'as'=>'user.destroy',
    'middleware'=>'roles',
    'roles'=>['Admin'],
]);
//reset password user
Route::post('/users/{id_user}',[
    'uses'=>'UserController@resetpassword',
    'as'=>'user.resetpassword',
    'middleware'=>'roles',
    'roles'=>['Admin'],
]);

/*
|--------------------------------------------------------------------------
| Application Routes donvis
|--------------------------------------------------------------------------
*/
Route::get('/donvi',[
    'uses'=>'DonviController@index',
    'as'=>'donvis',
]);
Route::get('/donvi/import',[
    'uses'=>'DonviController@import',
    'as'=>'donvi.import',
]);
Route::post('/donvi/import',[
    'uses'=>'DonviController@insert',
    'as'=>'donvi.insert',
]);

Route::get('/donvi/create',[
    'uses'=>'DonviController@create',
    'as'=>'donvi.create',
]);
Route::post('/donvi/create',[
    'uses'=>'DonviController@store',
    'as'=>'donvi.store',
]);
Route::get('/donvi/{id}',[
    'uses'=>'DonviController@edit',
    'as'=>'donvi.edit',
]);
Route::patch('/donvi/{id}',[
   'uses'=>'DonviController@update',
    'as'=>'donvi.update',
]);
Route::delete('/donvi/{id}',[
    'uses'=>'DonviController@destroy',
    'as'=>'donvi.destroy',
]);

/*
|--------------------------------------------------------------------------
| Application Routes buucucs
|--------------------------------------------------------------------------
*/
Route::get('/buucuc',[
    'uses'=>'BuucucController@index',
    'as'=>'buucucs',
]);
Route::get('/buucuc/import',[
    'uses'=>'BuucucController@import',
    'as'=>'buucuc.import',
]);
Route::post('/buucuc/import',[
    'uses'=>'BuucucController@insert',
    'as'=>'buucuc.insert',
]);
Route::get('/buucuc/create',[
    'uses'=>'BuucucController@create',
    'as'=>'buucuc.create',
]);
Route::post('/buucuc/create',[
    'uses'=>'BuucucController@store',
    'as'=>'buucuc.store',
]);
Route::get('/buucuc/{id}',[
    'uses'=>'BuucucController@edit',
    'as'=>'buucuc.edit',
]);
Route::patch('/buucuc/{id}',[
    'uses'=>'BuucucController@update',
    'as'=>'buucuc.update',
]);
Route::delete('/buucuc/{id}',[
    'uses'=>'BuucucController@destroy',
    'as'=>'buucuc.destroy',
]);

/*
|--------------------------------------------------------------------------
| Application Routes hanghoas
|--------------------------------------------------------------------------
*/
Route::get('/hanghoa',[
    'uses'=>'HanghoaController@index',
    'as'=>'hanghoas',
]);
Route::get('/hanghoa/import',[
    'uses'=>'HanghoaController@import',
    'as'=>'hanghoa.import',
]);
Route::post('/hanghoa/import',[
    'uses'=>'HanghoaController@insert',
    'as'=>'hanghoa.insert',
]);

Route::get('/hanghoa/create',[
    'uses'=>'HanghoaController@create',
    'as'=>'hanghoa.create',
]);
Route::post('/hanghoa/create',[
    'uses'=>'HanghoaController@store',
    'as'=>'hanghoa.store',
]);
Route::get('/hanghoa/{id}',[
    'uses'=>'HanghoaController@edit',
    'as'=>'hanghoa.edit',
]);
Route::patch('/hanghoa/{id}',[
    'uses'=>'HanghoaController@update',
    'as'=>'hanghoa.update',
]);
Route::delete('/hanghoa/{id}',[
    'uses'=>'HanghoaController@destroy',
    'as'=>'hanghoa.destroy',
]);



Route::get('/home', 'HomeController@index');
