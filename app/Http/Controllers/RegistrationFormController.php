<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegisterationForm;
use App\RegistrationFormType;
use App\UserType;
use App\Event;

class RegistrationFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = RegisterationForm::all()->where('isdeleted' , 0);
        return view('pages.UserView')
                ->with( 'forms' , $forms )
                ->with( 'formType' , new RegistrationFormType() )
                ->with( 'event' , new Event() )
                ->with( 'userType' , new UserType );
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
        //
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
    public function update(Request $request, $id)
    {
        $form = RegisterationForm::find($id);
        $form->name = $request->input('name');
        $form->registrationFormTypeId = $request->input('registrationFormTypeId');
        $form->registerAs = $request->input('registerAs');
        $form->isRegistrationClosed = $request->input('isRegistrationClosed');
        $form->save();
        return redirect('/registrationForm')->with('success' , 'Form Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = RegisterationForm::find($id);
        $form->isDeleted = 1;
        $form->save();
        return redirect('/registrationForm')->with('success' , 'Form Deleted Successfully');
    }
}
