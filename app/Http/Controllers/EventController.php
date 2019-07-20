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
        /*GET COUNTRIES*/
        $addresses = $this->GET_COUNTRIES();

        /*GET ACADEMIC YEARS NAME+ID*/
        $academicYears = $this->GET_ACADEMIC_YEARS();

        /*GET BOARDS NAME+ID*/
        $boards = $this->GET_BOARDS();

        /*GET EVENTS AND ADDRESSES STRINGS NAME+ID*/
        $events = $this->getAllEventsAndItsAdresses();


        $data = array('academicYears' => $academicYears,
                        'boards' => $boards,
                        'addresses' => $addresses,
                        'events' => $events,
                        'eventController' => new EventController());


        // return view('pages.addEvent')->with('data' , $data);

        return view('pages.addEvent')->with('data' , $data);
        // Controller::view('event', $allEvents);
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
    // public function getAcademicYears()
    // {
    //     $academicYears = AcademicYear::all();
    //     var_dump($academicYears);die();
    //     return $academicYears['name'];
    // }


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



    public function getAllEventsAndItsAdresses()
    {
        $allEvents = Event::all();
        foreach ($allEvents as $key => $event) {

            $event['eventAddressString'] =  $this->Address->getWholeAddress($event['addressId']);
        }
        return $allEvents;
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
        dd($request);
        $event=new Event();
        $event->name = $request->input("name");
        $event->date= $request->input("date");
        $event->eventStart= $request->input("eventStart");
        $event->eventEnd= $request->input("eventEnd");
        $event->addressId= $request->input("addressId");
        $event->academicYearId= $request->input("academicYearId");
        $event->coverImage= $request->input("coverImage");
        $event->boardId= $request->input("boardId");
        $event->save();
        // $event->


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
        dd($request);
        $event=new Event();
        $event->name = $request->input("name");
        $event->date= $request->input("date");
        $event->eventStart= $request->input("eventStart");
        $event->eventEnd= $request->input("eventEnd");
        $event->addressId= $request->input("addressId");
        $event->academicYearId= $request->input("academicYearId");
        $event->coverImage= $request->input("coverImage");
        $event->boardId= $request->input("boardId");
        $event->save();
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
