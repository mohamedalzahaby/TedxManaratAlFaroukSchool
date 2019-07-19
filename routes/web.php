<?php
use Illuminate\Support\Facades\Route;

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
Route::post('/posts/submit', 'PostController@store');
Route::post('/addboard/submit', 'BoardController@store'); 
Route::post('/departments/submit', 'DepartmentController@store');


Route::resource('posts', 'PostController');

Route::get('/', function () {
    return view('pages.about');
});
Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/addForm/addQuestion', 'RegisterationController@getOptionsDataTypes');

Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/product', function () {
    return view('pages.product');
});
Route::get('/ourTeam', 'BoardController@index' );
Route::get('/departments' ,'DepartmentController@index');
Route::get('/sendMail', function () {
    return view('pages.sendMail');
});
Route::get('/signUp', function () {
    return view('auth.register');
});



Route::resource('/registeration', 'RegisterationController');
Route::resource('RegisterationTypes', 'RegisterationTypeController');
Route::post('RegisterationTypesDestroy', 'RegisterationTypeController@destroy');
Route::post('RegisterationTypesUpdate', 'RegisterationTypeController@Update');

Route::get('/events', 'EventController@index');
Route::get('/tedx/addNewProduct','ProductTypeController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', function () {
    return redirect('/about');
});
// dd($_SERVER['REQUEST_URI']);

