<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Board;
use App\Event;
use App\Options;
use App\UserType;
use App\Department;
use App\Registeration;
use App\RegisterationForm;
use App\RegisterationDetails;
use App\RegistrationFormType;
use App\RegistrationFormOptionsValue;



class RegisterationController extends Controller
{
    private $event_M;
    private $board_M;
    private $options;
    private $UserType_M;
    private $department_M;
    private $registration_M;
    private $RegisterationForm;
    private $registrationDetails_M;
    private $RegistrationFormType_M;
    public function __construct()
    {
        $this->options = new Options();
        $this->department_M = new Department();
        $this->board_M = new Board();
        $this->event_M = new Event();
        $this->UserType_M = new UserType();
        $this->registration_M = new Registeration();
        $this->RegisterationForm = new RegisterationForm();
        $this->registrationDetails_M = new RegisterationDetails();
        $this->RegistrationFormType_M = new RegistrationFormType();
        $this->registrationFormOptionsValue_M = new RegistrationFormOptionsValue();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Columns = array('id' , 'name' );
        $openedForms = $this->RegisterationForm->getOpenedForms();
        $userTypes = Parent::getCertainColumns('UserType' , $Columns);
        $RegistrationFormTypes = Parent::getCertainColumns('registrationformtype' , $Columns);
        $data = array('userTypes' => $userTypes,
        'forms' => $openedForms ,
        'controller' => new Controller);
        return view('pages.register' , compact('RegistrationFormTypes'))->with('data' , $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {
        $formTypeId = $request->input('registerationFormType');


        // $RegistrationFormTypeController = new RegistrationFormTypeController();
        $events = $this->event_M->getEventsOpenedForRegistering();
        $Departments = $this->getDepartments_Of_CurrentBoard();
        echo "test";
        dd($Departments);
        $IsForEvent = $RegistrationFormTypeController->IsForEvent($formTypeId);
        $IsForEvent = $IsForEvent['isForEvent'];
        $formData = array('events' => $events , 'Departments' => $Departments , 'IsForEvent' => $IsForEvent
                            , 'registerationFormType' => $formTypeId , 'RegisterAs' => $request->input('RegisterAs') );

        Controller::view('addForm' , $formData);

        return view('pages.addForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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



    public function getDepartments_Of_CurrentBoard()
    {
        $boardId = $this->board_M->returnCurrentBoard();
        $board = Board::find($boardId);
        return  $board->departments;
    }
}
