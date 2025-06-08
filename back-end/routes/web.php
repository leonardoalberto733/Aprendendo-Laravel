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

Route::post('jornalist', 'API\JornalistsController@store');          // Funcionou XD
Route::get('jornalist', 'API\JornalistsController@index');           // Funcionou XD
Route::get('jornalist/{id}', 'API\JornalistsController@show');       // Funcionou XD
Route::put('jornalist/{id}', 'API\JornalistsController@update');     // Funcionou XD
Route::delete('jornalist/{id}', 'API\JornalistsController@destroy'); // Funcionou XD

Route::post('image', 'API\ImagesController@store');          // Funcionou XD
Route::get('image', 'API\ImagesController@index');           // Funcionou XD
Route::get('image/{id}', 'API\ImagesController@show');       // Funcionou XD
Route::put('image/{id}', 'API\ImagesController@update');     // Funcionou XD
Route::delete('image/{id}', 'API\ImagesController@destroy'); // Funcinou XD