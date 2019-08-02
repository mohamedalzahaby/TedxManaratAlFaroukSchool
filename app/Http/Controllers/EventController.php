<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Event;
use App\Address;
use App\AcademicYear;
use phpDocumentor\Reflection\Types\Parent_;

class EventController extends Controller
{
    private $AcademicYear;
    private $event;

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->AcademicYear = new AcademicYear();
        $this->Address = new Address();
        $this->event = new Event();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('date' , 'desc')->where('isdeleted',0)->get();
        return view('events.index')->with('events' , $events);
    }




    public function getChilds($id)
    {
        $Columns = array('id','name');
        $addresses = Address::select($Columns)->where('parentId', $id)->get();
        return $addresses;
    }
    public function getBoards()
    {
        $array =  DB::table('board')->select('name')->get();
        $boards = [];
        foreach ($array as $key => $value) {
            $array2 = (array) $value;
            $boardName = $array2['name'];
           array_push($boards , $boardName);
        }
        return $boards;
    }
    public function getCurrentAcademicYear()
    {
        $academicYear = AcademicYear::all()->last()->first();
        return $academicYear;
    }
    public function GET_BOARDS()
    {
        $boardColumns = array('id' , 'name' );
        $boards = Parent::getCertainColumns('board' , $boardColumns);
        return $boards;
    }
    public function GET_ACADEMIC_YEARS()
    {
        $academicYearsColumns = array('id' , 'name');
        $academicYears = Parent::getCertainColumns('academicYear' , $academicYearsColumns);
        return $academicYears;
    }
    public function GET_COUNTRIES()
    {
        $addresses = $this->getChilds(0);
        return $addresses;
    }
    // public function getAllEventsAndItsAdresses()
    // {
    //     $allEvents = Event::all();
    //     foreach ($allEvents as $key => $event) {

    //         $event['eventAddressString'] =  $this->Address->getWholeAddress($event['addressId']);
    //     }
    //     return $allEvents;
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*GET BOARDS NAME+ID*/
        $boards = $this->GET_BOARDS();
        return view('events.create')->with('boards' , $boards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coverimage = 'cover_image';
        // $this->validate($request ,[
        //     'name' =>           'required',
        //     'date' =>           'required',
        //     'eventStart' =>     'required',
        //     'eventEnd' =>       'required',
        //     'address' =>        'required',
        //     'academicYearId' => 'required',
        //     'boardId' =>        'required',
        //     $coverimage => 'image|nullable'
        //     ]);
        // check if file is selected
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

        }
        else {
            $fileNameToStore ='noimage.jpg';
        }

        $academicYrId = Board::find($request->input('boardId'))->academicYearId;

        $event=new Event();
        $event->name = $request->input("name");
        $event->date= $request->input("date");
        $event->eventStart= $request->input("eventStart");
        $event->eventEnd= $request->input("eventEnd");
        $event->address= $request->input("address");
        $event->description= $request->input("description");
        $event->academicYearId= $academicYrId;
        $event->boardId= $request->input("boardId");
        $event->GPSURl= $request->input("GPSURl");
        $event->facebookURL= $request->input("Event_URl");
        $event->coverImage= $fileNameToStore;
        $event->save();
        return redirect('/events')->with('success' , "event added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        if ($event->isdeleted ==1)
        {
            return redirect('/events')->with('Error','this event was removed');
        }
        return view('events.show')->with('event' , $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*GET BOARDS NAME+ID*/
        $boards = $this->GET_BOARDS();
        $event = Event::find($id);
        return view('events.edit')->with('boards' , $boards)->with('event' , $event);
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
        $coverimage = 'cover_image';
        $event = Event::find($id);
        // $this->validate($request ,[
        //     'name' =>           'required',
        //     'date' =>           'required',
        //     'eventStart' =>     'required',
        //     'eventEnd' =>       'required',
        //     'address' =>        'required',
        //     'academicYearId' => 'required',
        //     'boardId' =>        'required',
        //     $coverimage => 'image|nullable'
        //     ]);
        // check if file is selected
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
            $event->coverImage  = $fileNameToStore;

        }
        else {
            $fileNameToStore ='noimage.jpg';
        }

        $academicYrId = Board::find($request->input('boardId'))->academicYearId;


        $event->name = $request->input("name");
        $event->date= $request->input("date");
        $event->eventStart= $request->input("eventStart");
        $event->eventEnd= $request->input("eventEnd");
        $event->address= $request->input("address");
        $event->description= $request->input("description");
        $event->academicYearId= $academicYrId;
        $event->boardId= $request->input("boardId");
        $event->GPSURl= $request->input("GPSURl");
        $event->facebookURL= $request->input("Event_URl");
        $event->save();
        return redirect('/events')->with('success' , "event updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->isdeleted = 1;
        $event->save();
        return redirect('/events')->with('success' , "event deleted successfully");
    }


    public function addressHtml($data)
    {
        echo  "<select name='addressId' onchange='myFunction(this.value)' id='mySelect'>
                    <option value='0'>add new place</option>";
                    foreach ($data as $key1 => $places) {
                        foreach ($places as $key => $SinglePlace) {
                            if ($key1 == 'addresses') {
                                $id = $SinglePlace['id'];
                                $name = $SinglePlace['name'];
                                echo "<option id='myOption' name='$id' value='$id'> $name </option>";
                            }
                    }
                }
        echo "</select>";

    }

}
