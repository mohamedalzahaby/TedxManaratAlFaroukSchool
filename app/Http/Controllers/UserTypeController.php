<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserType;
use App\Permission;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Database\Eloquent\Collection;

class UserTypeController extends Controller
{
    protected $userType;

    public function __construct()
    {
        $this->middleware('auth');
    }


    // public function autherization($url , $permissionName)
    // {
    //     $redirect = true;
    //     $userTypeId = auth()->user()->userTypeId;
    //     $permission = Permission::all()->where('name' , $permissionName )->first();
    //     $userTypes = $permission->userTypes()->get();
    //     foreach ($userTypes as $key => $value) {
    //         if ($value->id == $userTypeId) {
    //             $redirect = false;
    //         }
    //     }
    //     // dd($redirect);
    //     if($redirect) { return redirect('contact')->with('error' , 'Unauthorized Page');}
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->autherization( 'contact' ,'show UserType');
        $parentTypes = UserType::all()->where('parentId',0)->where('isdeleted',0);
        $UserTypes = UserType::all()->where('isdeleted' , 0);
        return view('userType.index')
        ->with('userTypes',$UserTypes)
        ->with('parentTypes',$parentTypes)
        ->with('parent',new UserType());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return $this->autherization( 'contact' ,'create UserType');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $this->autherization( 'contact' ,'add UserType');
        $userType = new UserType();
        $userType->name = $request->input('name');
        $userType->parentId = $request->input('parent');
        $userType->save();
        return redirect('/usertype')->with('success' , 'user type added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $this->autherization( 'contact' ,'show UserType');
        $UserType = UserType::find($id);
        $UserType_permissions = $UserType->permissions()->get();
        $ids = [];
        foreach ($UserType_permissions as $key => $permission) {
            array_push($ids , $permission->id);
        }
        $Permissions = Permission::all()->whereNotIn('id' , $ids)->where('isdeleted' , 0);

        return view('userType.show')
        ->with('UserType_permissions',$UserType_permissions)
        ->with('Permissions', $Permissions)
        ->with('userTypeId', $id);
    }

    public function attach(Request $request)
    {
        // return $this->autherization( 'contact' ,'attach permission');
        $id = (integer)$request->input('userTypeId');
        $UserType = UserType::find($id);
        $UserType->permissions()->attach([$request->input('permissionId')]);
        return redirect('usertype/'.$id)->with('seccuess' , 'permission attaches successfully');
    }
    public function detach(Request $request)
    {
        // return $this->autherization( 'contact' ,'detach permission');
        $id = (integer)$request->input('userTypeId');
        $UserType = UserType::find($id);
        $UserType->permissions()->detach([$request->input('permissionId')]);
        return redirect('usertype/'.$id)->with('seccuess' , 'permission attaches successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $this->autherization( 'contact' ,'edit UserType');
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
        // return $this->autherization( 'contact' ,'update UserType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $this->autherization( 'contact' ,'delete UserType');
        /* dettach permissions */
        $userType = UserType::find($id);
        $permissions = $userType->permissions()->get();
        if (!$permissions->isEmpty()) {
            foreach ($permissions as $key => $permission) {
                $permission->userTypes()->detach([$id]);
            }
        }

        // $Permissions = Permission::all()->where('isdeleted' , 0);
        // foreach ($Permissions as $key => $permission) {
        //     $permission_userTypes = $permission->userTypes()->get();
        //     foreach ($permission_userTypes as $key => $userType) {
        //         if($userType->id == $id){
        //             $permission->userTypes()->detach([$id]);
        //         }
        //     }
        // }
        /* delete Usertype */
        $userType->isdeleted = 1;
        $userType->save();
        return redirect('/usertype')->with('success' , 'User Type Deleted Successfully');
    }
}
