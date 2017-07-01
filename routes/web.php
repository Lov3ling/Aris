<?php
use App\User;
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
Route::get('/test',function (){
    $user=User::find(3);
    return view('email.Register')->with(['user'=>$user]);
});

Route::get('/email/auth/{token}','Auth\EmailAuth@index');               //  邮箱验证



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('userauth');
