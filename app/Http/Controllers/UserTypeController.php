<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserType;
use App\Permission;


class UserTypeController extends Controller
{
    protected $userType;

    public function __construct()
    {

        $this->middleware('auth');




    }


    public function autherization($url , $permissionName)
    {
        $redirect = true;
        $userTypeId = auth()->user()->userTypeId;
        $permission = Permission::all()->where('name' , $permissionName )->first();
        $userTypes = $permission->userTypes()->get();
        foreach ($userTypes as $key => $value) {
            if ($value->id == $userTypeId) {
                $redirect = false;
            }
        }
        // dd($redirect);
        if($redirect) { return redirect('contact')->with('error' , 'Unauthorized Page');}
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $this->autherization( 'contact' ,'show UserType');
        $UserTypes = UserType::all()->where('isdeleted' , 0);
        return view('userType.index')
        ->with('userTypes',$UserTypes)
        ->with('parent',new UserType());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->autherization( 'contact' ,'create UserType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->autherization( 'contact' ,'store UserType');
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
        return $this->autherization( 'contact' ,'show UserType');
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
        return $this->autherization( 'contact' ,'edit UserType');
    }
    // public function test()
    // {

    //         $ids = [];
    //         $permissions = Permission::all();
    //         foreach ($permissions as $key => $value) {
    //             array_push($ids, $value->id);
    //         }


    //     $UserType = UserType::find(5);
    //     // $UserType->permissions()->attach($ids);

    //     $tst = $UserType->permissions()->get();
    //     dd($tst);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->autherization( 'contact' ,'update UserType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->autherization( 'contact' ,'delete UserType');
    }
}
