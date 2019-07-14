<?php

include('Globals.php');
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
    return view('pages.about');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/product', function () {
    return view('pages.product');
});
Route::get('/ourTeam', function () {
    return view('pages.ourTeam');
});
Route::get('/sendMail', function () {
    return view('pages.sendMail');
});
Route::get('/signUp', function () {
    return view('auth.register');
});

Route::get('/registeration', 'RegisterationController@index');
Route::resource('RegisterationTypes', 'RegisterationTypeController');
Route::post('RegisterationTypesDestroy', 'RegisterationTypeController@destroy');

Route::get('/events', 'EventController@index');

Route::get('/addNewProduct','ProductTypeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


