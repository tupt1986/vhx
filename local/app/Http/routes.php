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



Route::get('/home', 'HomeController@index');
