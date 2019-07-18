<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Password;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255' , 'unique:users'],
            'ismale'=> 'required|in:1,2',
            'birthDate' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);

    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function loginvalidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function storePassword( $id ,  array $data)
    {
        // $original = $id['original'];
        // dd($id);
        // var_dump($id); die();
        $password = new Password();
        $password->userId  = $id;
        $password->password = Hash::make($data['password']);

        $password->save();
        // return redirect('/about')->with('success' , 'login done');
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);

        $User = new User();
        $User->fname = $data['fname'];
        $User->lname = $data['lname'];
        $User->userTypeId = $data['userTypeId'];
        $User->ismale = $data['ismale'];
        $User->birthDate = $data['birthDate'];
        $User->email = $data['email'];
        $User->password = Hash::make($data['password']);
        $User->save();
        return $User;


        // $id = $User->create([
        //     'fname' => $data['fname'],
        //     'lname' => $data['lname'],
        //     'userTypeId' => $data['userTypeId'],
        //     'ismale' => $data['ismale'],
        //     'birthDate' => $data['birthDate'],
        //     'email' => $data['email'],
        //     // 'password' => Hash::make($data['password']),
        // ]);
        $this->storePassword($User->id ,  $data);
    }
}
