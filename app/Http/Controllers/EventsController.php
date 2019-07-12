<?php

// namespace App\Http\Controllers;
// use App\Board;
// use App\Event;
// use App\Address;
// use App\AcademicYear;
// use Illuminate\Http\Request;

// class EventController extends Controller
// {
//     private $eventModel;
//     private $addressModel;

//     public function __construct($id = '')
//     {
//         $this->eventModel= new Event();
//          $this->academicYearModel = new AcademicYear();
//          $this->addressModel = new Address();
//         $this->boardModel = new Board();
//     }

//     public function getChilds($id)
//     {
//         $Columns = array('id','name');
//         $addresses = Address::select($Columns)->where('parentId', $id)->get();
//         return $addresses;
//     }

//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {

//         die('hello');
//         $addresses = $this->getChilds(0);
//         $addresses = $addresses[0]['name'];
//         $academicYears =AcademicYear::getAcademicYears();
//         dd($academicYears);
//         $boards = $this->boardModel->getBoards();
//         $twoDArr = array('academicYears' => $academicYears, 'boards' => $boards, 'addresses' => $addresses);
//         view('pages.addEvent')->with('addresses' , $twoDArr);
//         Controller::view('addEvent', $twoDArr);

//         $allEvents = $this->eventModel->getEventsdata();
//         foreach ($allEvents as $key => $event) {
//             array_push($allEvents[$key], $this->addressModel->getWholeAddress($event['addressId']));
//         }

//         Controller::view('event', $allEvents);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }
