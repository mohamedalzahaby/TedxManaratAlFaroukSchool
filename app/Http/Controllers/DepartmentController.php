<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Department;
use App\Board;

class DepartmentController extends Controller
{
    private $imagesFolderRoutes;

    public function __construct()
    {
        $this->imagesFolderRoutes = 'public/cover_images';
        // $this->middleware('auth', ['except' => ['index', 'show']]);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $departments= Department::all()->where('isdeleted' ,0);
    //     return view('departments.index')->with('departments',$departments);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $boards= Board::all()->where('isdeleted' ,0);
        return view('departments.create')->with('boards',$boards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Department=new Department();
        $Department->name=$request->input('name');
        $Department->jobDescribtion=$request->input('jobDescribtion');
        $Department->image = $request->input('image');
        $Department->board_id=$request->input('board_id');
        $Department->save();
        return redirect('/departments')->with('success','Department Add Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $departments=Department::find($id);
    //     if ($departments->isdeleted ==1)
    //     {
    //         return redirect('/departments')->with('Error','this department is removed');

    //     }
    //     else {
    //         return view('departments.show')->with('departments',$departments)->with('id',$id);

    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments=Department::find($id);
        $boards = Board::all()->where('isdeleted' , 0);
        return  view('departments.edit')
        ->with('departments',$departments)
        ->with('boardObj', new Board() )
        ->with('boards', $boards );
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
        $Department=Department::find($id);
        $Department->name=$request->input('name');
        $Department->jobDescribtion=$request->input('jobDescribtion');
        $Department->image = $request->input('image');
        $Department->board_id=$request->input('board_id');
        $Department->save();
        return redirect('/departments')->with('success','Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  //permission
        $department=Department::find($id);
        $department->isdeleted = 1;
        $department->save();

        if ($department->cover_Image != 'noimage.jpg') {
            $imageRoute =  $this->imagesFolderRoutes.'/'.$department->image;
            Storage::delete( $imageRoute );
        }
        return redirect('/ourTeam')->with('success' , 'Department Deleted Successfully');
    }
}
