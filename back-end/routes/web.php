<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return response()->json('ola');
});
*/
Route::get('/', function () {
    return view('welcome');
});

Route::post('contact', 'API\ContactsController@store');          // Funcionou   XD
Route::get('contact', 'API\ContactsController@index');           // Funcionou   XD
Route::get('contact/{id}', 'API\ContactsController@show');       // Funcionou   XD
Route::put('contact/{id}', 'API\ContactsController@update');     // Funcionou   XD
Route::delete('contact/{id}', 'API\ContactsController@destroy'); // Funcionou   XD

Route::post('new', 'API\NewsController@store');          // Funcionou   XD
Route::get('new', 'API\NewsController@index');           // Funcionou   XD
Route::get('new/{id}', 'API\NewsController@show');       // Funcionou   XD
Route::put('new/{id}', 'API\NewsController@update');     // Funcionou   XD
Route::delete('new/{id}', 'API\NewsController@destroy'); // Funcionou   XD