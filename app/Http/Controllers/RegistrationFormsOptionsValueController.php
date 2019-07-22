<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistrationFormOptionsValue;
use App\Board;
use App\Registeration;
use App\AcademicYear;
use App\RegisterationDetails;
use App\RegisterationForm;
use DB;

class RegistrationFormsOptionsValueController extends Controller
{
    protected $registrationFormsOptionsValue_M;
    protected $board_M;

    public function __construct()
    {
        $this->board_M = new Board();
        $this->AcademicYear_M = new AcademicYear();
        $this->registeration_M = new Registeration();
        $this->registerationDetails_M = new RegisterationDetails();
        $this->RegistrationFormOptionsValue_M = new RegistrationFormOptionsValue();

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        /* get current BoardID */
        $currentboardId = $this->board_M->returnCurrentBoard();
        /* get current AcademicYearID */
        $currentAcademicYearId = Board::find($currentboardId)->academicYearId;
        /* store in registration table */
        $this->registrationStore( auth()->user()->id , $currentAcademicYearId);
        /* store in registration Details */
        $this->registrationDetailsStore($currentboardId, 1 , $this->registeration_M->id , $request->input('formId'));
        /* get last registrationDetailsId */
        $registrationDetailsLastId = $this->registerationDetails_M->id;
        /* store values by regformId and $_POST(optionId with its answer) */
        $this->storeValues($request , $request->input('formId') , $registrationDetailsLastId);
        return redirect('/registeration')->with(['success'=> 'Form Submitted Successfuly']);
    }

    public function registrationStore($userId, $currentAcademicYearId)
    {
        $this->registeration_M->userId = $userId;
        $this->registeration_M->academicYearId = $currentAcademicYearId;
        $this->registeration_M->save();
    }
    public function registrationDetailsStore($boardId, $statusId , $registerationId, $registrationFormId)
    {
        $this->registerationDetails_M->boardId = $boardId;
        $this->registerationDetails_M->statusId = $statusId;
        $this->registerationDetails_M->registerationId = $registerationId;
        $this->registerationDetails_M->registrationFormId = $registrationFormId;
        $this->registerationDetails_M->save();
    }
    public function storeValues(Request $request , $registrationDetailsId)
    {

        $formId = $request->input('formId');
        $rids = [];
        foreach ($request->input() as $key => $value) {
            if(is_numeric($key)){
                $where = array( 'options_id' =>$key  , 'registeration_form_id' => $formId );
                $relationId = DB::table('registrationformoptions')->select('rid')->where($where)->get();
                $rid = $relationId[0]->rid;
                $valueTable = new RegistrationFormOptionsValue();
                $valueTable->registrationFormOptionsId = $rid;
                $valueTable->value = $value;
                $valueTable->registrationDetailsId = (integer)$registrationDetailsId;
                $valueTable->save();
            }
        }
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
