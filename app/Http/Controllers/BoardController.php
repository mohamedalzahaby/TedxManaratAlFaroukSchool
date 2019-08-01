<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\board;
use App\AcademicYear;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class BoardController extends Controller
{
    protected $board;
    private $imagesFolderRoutes;
    public function __construct()
    {
        $this->middleware('auth' , ['except' => ['index' , 'show']]);
        $this->imagesFolderRoutes = 'public/cover_images';
        $this->board = new Board();
    }
    public function index()
    {
        if (Auth::guest()) {
          
            $isAccepted = false;
            
        }
        else {
            $isAccepted = Parent::autherization('show board' , true);
        }
        $boards = Board::all()->where('isdeleted',0);
        return view('boards.index')->with('boards' , $boards)->with('isAccepted', $isAccepted);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        if(Parent::autherization('show board')){
            return Parent::autherization('show board');
            return view('boards.create');
        }
    }

    public function store(Request $request)
    {
        if($request->input('Opendate') > $request->input('closedate')){
            return redirect('/ourTeam/create')->with('error' , 'opening date can not be after closing date.');
        }
        $image = 'cover_image';
        // dd($request);
        // $this->validate($request ,[
        //     'name' => 'required',
        //     'Opendate' => 'required',
        //     'closedate' => 'required',
        //     'description' => 'required'
        //     ]);
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
        $board=new Board();
        $board->name=$request->input('name');
        $board->openingDate=$request->input('Opendate');
        $board->closingDate=$request->input('closedate');
        $board->description=$request->input('description');
        // $board->academicYearId = $request->input('academicYearId');
        $board->academicYearId = 1;
        // var_dump($request->input('academicYearId')); die();
        $board->image  = $fileNameToStore;
        $board->save();
       return redirect('/ourTeam')->with('success' , 'Board Added Successfully');
    }
    public function show($id)
    {
        
        if (Auth::guest()) {
            $isAccepted = false;
        }
        else {
            $isAccepted = Parent::autherization('show board' , true);
        }
        // $boards = Board::all()->where('isdeleted',0);
        // return view('boards.show')->with('boards' , $boards)->with('isAccepted', $isAccepted);

        return redirect('/ourTeam')->with('error','this board is removed');

        $board=Board::find($id);
        $departments = $board->departments()->where('isdeleted',0)->get();
        if ($departments->isEmpty()) {
            return redirect('/ourTeam');
        }
        if($board->isdeleted == 1){
            return redirect('/ourTeam')->with('error','this board was removed');
        }
        else {
            return view('departments.index')
            ->with('board',$board)
            ->with('departments',$departments);
        }
    }
    public function edit($id)
    {
        $academicYrs = AcademicYear::all()->where('isdeleted',0);
        $boards=Board::find($id);
         return  view('boards.edit')
         ->with('boards',$boards)
         ->with('academicYrs',$academicYrs)
         ->with('year', new AcademicYear() );
    }
    public function update(Request $request, $id)
    {
       $Board=Board::find($id);
        $image = 'cover_image';
        // dd($request);
        // $this->validate($request ,[
        //     'name' => 'required',
        //     'Opendate' => 'required',
        //     'closedate' => 'required',
        //     'description' => 'required'
        //     ]);
            // $Board= new board();
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
                $Board->image  = $fileNameToStore;
            }
            else {
                $fileNameToStore ='noimage.jpg';
            }
        $Board->name=$request->input('name');
        $Board->openingDate=$request->input('Opendate');
        $Board->closingDate=$request->input('closedate');
        $Board->description=$request->input('description');
        // $Board->academicYearId = $request->input('academicYearId');
        $Board->academicYearId = 1;
        $Board->save();
       return redirect('/ourTeam');
    }
    public function destroy($id)
    {
        $boards=Board::find($id);
        if ($boards->cover_Image != 'noimage.jpg') {
            $imageRoute =  $this->imagesFolderRoutes.'/'.$boards->image;
            Storage::delete( $imageRoute );
        }
        $boards->isdeleted = 1;
        $boards->save();
        return redirect('/ourTeam')->with('success' , 'board Deleted');
    }
}
