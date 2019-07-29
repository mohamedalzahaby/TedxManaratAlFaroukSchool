<?php
use App\DataType;

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
Route::get('/tables', function () {
    return view('pages.tables');
});
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
Route::post('/posts/submit', 'PostController@store');
Route::resource('posts', 'PostController');

Route::get('/addForm/addQuestion', 'RegisterationController@getOptionsDataTypes');

Route::resource('/registeration', 'RegisterationController');
Route::resource('RegisterationTypes', 'RegisterationTypeController');
Route::resource('/FormOptionValues', 'RegistrationFormsOptionsValueController');
Route::post('RegisterationTypesDestroy', 'RegisterationTypeController@destroy');
Route::post('RegisterationTypesUpdate', 'RegisterationTypeController@Update');
Route::resource('/events', 'EventController');
Route::resource('/registrationForm', 'RegistrationFormController');
Route::resource('/user', 'UserController');
Route::resource('/usertype', 'UserTypeController');

Route::get('/tedx/addNewProduct','ProductTypeController@index');
Auth::routes();
// Route::get('/home', function () {
//     return view('pages.about');
// });
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/events', 'EventController');
    // Route::get('/permissions',"UserTypeController@test");
Route::post('/addquestion','AjaxController@myajaxagain');
Route::get('/showtable','RegistrationFormsOptionsValueController@showTables');

Route::post('/usertype/attach','UserTypeController@attach');
Route::post('/usertype/detach','UserTypeController@detach');

