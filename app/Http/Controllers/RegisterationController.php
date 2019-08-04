<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Board;
use App\Event;
use App\Options;
use App\UserType;
use App\DataType;
use App\Department;
use App\Registeration;
use App\RegisterationForm;
use App\RegisterationDetails;
use App\RegistrationFormType;
use App\RegistrationFormOptionsValue;
use phpDocumentor\Reflection\Types\Parent_;

class RegisterationController extends Controller
{
    private $event_M;
    private $board_M;
    private $options_M;
    private $UserType_M;
    private $DataType_M;
    private $department_M;
    private $registration_M;
    private $RegisterationForm;
    private $registrationDetails_M;
    private $RegistrationFormType_M;
    public function __construct()
    {
        $this->board_M = new Board();
        $this->event_M = new Event();
        $this->options_M = new Options();
        $this->DataType_M = new DataType();
        $this->UserType_M = new UserType();
        $this->department_M = new Department();
        $this->registration_M = new Registeration();
        $this->RegisterationForm = new RegisterationForm();
        $this->registrationDetails_M = new RegisterationDetails();
        $this->RegistrationFormType_M = new RegistrationFormType();
        $this->registrationFormOptionsValue_M = new RegistrationFormOptionsValue();
        //if not login go to login page
        $this->middleware('auth', ['except' => [ 'index']]);
        //autherization
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if not signed in
        if (Auth::guest()) {
            $isAccepted = false;
        }
        else {
            $isAccepted = Parent::autherization('show registrationForm' , true);
        }
        $Columns = array('id', 'name');
        $openedForms = $this->RegisterationForm->getOpenedForms();
        $userTypes = UserType::all()->where('isdeleted', 0);
        $RegistrationFormTypes = Parent::getCertainColumns('registrationformtype', $Columns);
        $data = array(
            'userTypes' => $userTypes,
            'forms' => $openedForms
        );
        return view('pages.register', compact('RegistrationFormTypes'))
        ->with('data', $data)
        ->with('isAccepted', $isAccepted);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $formTypeId = $request->input('registerationFormType');
        $events = $this->event_M->getEventsOpenedForRegistering();
        $Departments = $this->getDepartments_Of_CurrentBoard();
        $IsForEvent = $this->RegistrationFormType_M->getIsForEventValue($formTypeId);
        $data = array(
            'events' => $events,
            'Departments' => $Departments,
            'IsForEvent' => $IsForEvent,
            'registerationFormType' => $formTypeId,
            'RegisterAs' => $request->input('RegisterAs')
        );
        return view('pages.addForm')->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = new RegisterationForm();
        $this->storeInForm($form, $request);
        $this->storeOptions($form, $request);
        // dd('register store');
        return redirect('/registeration')->with('success', 'Form Add Successfully');
    }

    public function storeInForm($form,  Request $request)
    {
        $form->name = $request->input("name"); // => "tedx2019Form"
        $form->registrationFormTypeId = $request->input("registerationFormTypeId"); // => "3"
        $form->RegisterAs = $request->input("RegisterAs"); // => "4"
        $form->save();
        $formType = RegistrationFormType::find($request->input("registerationFormTypeId"));
        if ($formType->isForEvent) {
            $form->events()->sync([$request->input("eventId")]);
        } else {
            $form->departments()->sync([$request->input("departmentId")]);
        }
    }
    public function storeOptions($form, Request $request)
    {

        $ctr = (int) $request->input("ctr"); // => "1"

        $ids = [];
        for ($i = 0; $i <= $ctr; $i++) {
            $option = new Options();
            $option->name = $request->input("OptionName$i");
            $option->dataTypeId = $request->input("OptionType$i");
            $option->save();
            array_push($ids, $option->id);
        }
        $form->options()->attach($ids);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $form = RegisterationForm::find($id);
        $formEvent = $form->events()->get()->where('isdeleted', 0)->first();
        $formQuestions = $form->options()->get()->where('isdeleted', 0);

        return view('pages.showForm')
        ->with('form', $form)
        ->with('formEvent', $formEvent)
        ->with('formQuestions', $formQuestions)->with('dataTypesObj', new DataType());
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


    public function getOptionsDataTypes()
    {
        $data = DataType::all();
        return view('pages.anotherQuestion')->with('data', $data);
    }
}
