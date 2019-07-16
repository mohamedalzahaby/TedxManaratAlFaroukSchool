<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\UserType;
use App\Registeration;
use App\RegisterationForm;
use App\RegisterationDetails;
use App\RegistrationFormType;
use App\RegistrationFormOptionsValue;

class RegisterationController extends Controller
{
    private $Options;
    private $event_M;
    private $UserType_M;
    private $registration_M;
    private $RegisterationForm;
    private $registrationDetails_M;
    private $RegistrationFormType_M;
    public function __construct()
    {
        // $this->Options = new Options();
        // $this->event_M = new Event();
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
        dd($request);
        $formTypeId = $request->input('registerationFormType');
        $this->eventController = new EventController();
        $DepartmentController = new DepartmentController();
        $RegistrationFormTypeController = new RegistrationFormTypeController();
        $events = $this->eventController->getEventsOpenedForRegistering();
        $Departments = $DepartmentController->getDepartments_Of_CurrentBoard();
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
}
