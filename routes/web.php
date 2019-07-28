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
Route::get('/permissions',"UserTypeController@test");
Route::post('/addquestion','AjaxController@myajaxagain');
Route::get('/showtable','RegistrationFormsOptionsValueController@showTables');


// Route::get('/permissions',function() {
//     $permissions = array(
//         'add UserType',
//         'update UserType' ,
//         'delete UserType' ,
//         'show UserType' ,

//         'add post' ,
//         'update post' ,
//         'delete post' ,
//         'show post' ,

//         'add event' ,
//         'update event' ,
//         'delete event' ,
//         'show event' ,

//         'add board' ,
//         'update board' ,
//         'delete board' ,
//         'show board' ,

//         'add department' ,
//         'update department' ,
//         'delete department' ,
//         'show department' ,

//         'add registrationFormTypes' ,
//         'update registrationFormTypes' ,
//         'delete registrationFormTypes' ,
//         'show registrationFormTypes' ,

//         'add registrationForm' ,
//         'update registrationForm' ,
//         'delete registrationForm' ,
//         'show registrationForm' ,

//         'add registrationFormValues' ,
//         'update registrationFormValues' ,
//         'delete registrationFormValues' ,
//         'show registrationFormValues' ,

//         'update about Page' ,
//         'update contact Page' );
//     foreach ($permissions as $key => $permission) {
//         DB::insert('insert into permissions (name) values (?)', [$permission]);
//     }
//     dd('done');
//  });


