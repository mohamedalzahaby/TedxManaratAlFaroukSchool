<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\board;
use App\AcademicYear;
use Illuminate\Support\Facades\Storage;
class BoardController extends Controller
{
    protected $board;

    public function __construct()
    {
        $this->board = new Board();
    }


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
        $image = 'cover_image';
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
        $Board=$this->board;
        
        $Board->name=$request->input('name');
        
        $Board->openingDate=$request->input('Opendate');
        
        $Board->closingDate=$request->input('closedate');
        
        $Board->description=$request->input('description');
        
        // $Board->academicYearId = $request->input('academicYearId');
        $Board->academicYearId = 1;
        
        // var_dump($request->input('academicYearId')); die();
        $Board->cover_Image  =$request->input('image');
        // dd($fileNameToStore);

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
        //
    }
}
