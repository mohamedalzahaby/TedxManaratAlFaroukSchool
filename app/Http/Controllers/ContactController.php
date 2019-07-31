<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\contactus;

class ContactController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth' , ['except' => [ 'store','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function index()
    {
        if (Auth::guest()) {
          
            $isAccepted = false;
            
        }
        else {
            $isAccepted = Parent::autherization('show board' , true);
        }

        $forms= contactus::all()->where('isdeleted',0);
        return view('pages.showmesseges')->with('forms',$forms)->with('isAccepted',$isAccepted);
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
        $contact=new contactus();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->messege=$request->input('messege');
        $contact->save();
        return redirect('/contact');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $form=contactus::find($id);
        
        return view('contactus.show')->with('form',$form);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messege=contactus::find($id);
        $messege->isdeleted = 1;
        $messege->save();
        return redirect('/contact')->with('success' , 'messege Deleted');

    }
}
