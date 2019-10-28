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

Route::get('/', function()
{
    return view('pages.home');
});
Route::get('/users', 'UserController@index');
Route::post('/users', 'UserController@store');
Route::get('/users/{user_id}', 'UserController@Subordinates');

Route::get('/roles', 'RoleController@index');
Route::get('/roles/{role}', 'RoleController@show');
Route::post('/roles', 'RoleController@store');
