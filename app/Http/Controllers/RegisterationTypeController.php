<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\RegistrationFormType;

class RegisterationTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//store update destroy\
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registrationFormType = new RegistrationFormType();
        $registrationFormType->name  = $request->input('name');
        $this->formTypeValidations($request);
        $value = $this->getCheckBoxValue($request);
        $registrationFormType->isForEvent  = $value;
        $registrationFormType->save();
        return redirect('/registeration')->with('success' , 'Registration Form Type Added');
    }

    public function formTypeValidations($request)
    {
        $this->validate($request ,[
            'name' => 'required|nullable'
            ]);
    }
    /* check if the checkbox checked */
    public function getCheckBoxValue($request)
    {
        $value = ( empty( $request->input('isForEvent') ) ) ? 0 : 1 ;
        return $value;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('registerationFormType');
        $name = $request->input('updatedName');
        DB::update("update registrationformtype set name = '$name' where id = ?", [$id]);
        return redirect('/registeration')->with('success' , 'Registration Form Type Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('registerationFormType');
        DB::update('update registrationformtype set isdeleted = 1 where id = ?', [$id]);
        return redirect('/registeration')->with('success' , 'Registration Form Type Deleted');
    }
}
