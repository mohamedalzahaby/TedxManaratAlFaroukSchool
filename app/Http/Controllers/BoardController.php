<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\board;
use App\AcademicYear;
use Illuminate\Support\Facades\Storage;
class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::all();
        return view('pages.ourTeam')->with('boards' , $boards);
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
        $image = 'image';

        // dd($request);

        $this->validate($request ,[
            'name' => 'required',
            'Opendate' => 'required',
            'closedate' => 'required',
            'description' => 'required'
            ]);


        if ($request->hasFile($image))
        {

            # get file name with extension
            $filenameWithExt = $request->file($image)->getClientOriginalName();
            //get just filename
            $filename =pathinfo($filenameWithExt , PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file($image)->getClientOriginalExtension();//get extension
            //fileNameToStore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload
            $path = $request->file($image)->storeAs('public/cover_images',$fileNameToStore);

        }
        else {
            $fileNameToStore ='noimage.jpg';
        }


        // dd($request);
        $Board=new board();

        $Board->name=$request->input('name');
        $Board->openingDate=$request->input('Opendate');
        $Board->closingDate=$request->input('closedate');
        $Board->description=$request->input('description');
        $Board->academicYearId = $request->input('academicYearId');
        $Board->image  = $fileNameToStore;

        $Board->save();
       return redirect('/ourTeam')->with('success','Board Created');
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
        //permissions in laravel

        $coverimage = 'cover_image';
        $Board = Board::find($id);

        $this->validate($request ,[
            'name' => 'required',
            'Opendate' => 'required',
            'closedate' => 'required',
            'description' => 'required'
            ]);

        if ($request->hasFile($coverimage))
        {
            # get file name with extension
            $filenameWithExt = $request->file($coverimage)->getClientOriginalName();
            //get just filename
            $filename =pathinfo($filenameWithExt , PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file($coverimage)->getClientOriginalExtension();//get extension
            //fileNameToStore
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload
            $path = $request->file($coverimage)->storeAs('public/cover_images',$fileNameToStore);
            $Board->cover_image  = $fileNameToStore;
        }





        $Board->name=$request->input('name');
        $Board->openingDate=$request->input('Opendate');
        $Board->closingDate=$request->input('closedate');
        $Board->description=$request->input('description');
        $Board->academicYearId = $request->input('academicYearId');
        $Board->image  = $fileNameToStore;

        $Board->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // permission
    }
}
