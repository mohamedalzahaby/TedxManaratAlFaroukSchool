<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use App\Board;
use App\AcademicYear;
use App\Registeration;
use App\RegisterationForm;
use App\RegisterationDetails;
use App\RegistrationFormsOptions;
use App\RegistrationFormOptionsValue;

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
        
    }

    public function showTables()
    {
        $formId = 24;
        $registeration = new Registeration();
        $data = DB::select('SELECT `value` AS `answer` , `options`.name AS `question` , `users`.`id` AS `userId` , `users`.`fname`,`users`.`lname` , `users`.`email`,`users`.`ismale`,`users`.`birthDate` , `usertype`.`name` AS `user Type` FROM `registrationformoptionsvalue` JOIN `registrationformoptions` ON `registrationformoptionsvalue`.`registrationFormOptionsId` = `registrationformoptions`.`rid` JOIN `options` ON `options`.`id` = `registrationformoptions`.`options_id` JOIN `registerationdetails` ON `registerationdetails`.`id` = `registrationformoptionsvalue`.`registrationDetailsId` JOIN `registeration` ON `registeration`.`id` = `registerationdetails`.`registerationId` JOIN `users` ON `users`.`id` = `registeration`.`userId` JOIN `usertype` ON `usertype`.`id` = `users`.`userTypeId` WHERE `registrationformoptions`.`registeration_form_id` = ? AND `registerationdetails`.`registrationFormId` = ?', [24,24]);
        return view('pages.showSubmittedForms')->with('data' , $data);
        
        // dd(DB::table('Registeration')
        // ->join('RegisterationDetails', 'Registeration.id', '=', 'RegisterationDetails.RegisterationId')
        // ->join('RegistrationFormOptionsValue', 'RegisterationDetails.id', '=', 'RegistrationFormOptionsValue.registrationDetailsId')
        // ->join('registrationformoptions', 'registrationformoptions.rid', '=', 'RegistrationFormOptionsValue.registrationformoptionsId')
        // ->join('registrationformoptions', 'registerationform.id', '=', 'registrationformoptions.registeration_form_id')
        // ->select('Registeration.userId', 'RegisterationDetails.status', 'RegistrationFormOptionsValue.value' , 'questionname')
        // ->where('RegisterationDetails.registrationFormId' , $formId)
        // ->get());
        
        // $RegisterationDetails_of_this_form = RegisterationDetails::all()->where('registrationFormId', 24);
        // foreach ($RegisterationDetails_of_this_form as $key => $RDtable) {
        //     $registerationId = $RDtable->registerationId;
        //     // Registeration::find
        // }
        // dd($RegisterationDetails_of_this_form);
        // // $registration = Registeration::find($RegisterationDetails_of_this_form->registerationId); 
        
        // $form = RegisterationForm::find($formId);
        // $questions = $form->options()->get();
        // $AllQandA = [] ;
        // foreach ($questions as $key => $question) {
        //     $where = array('registeration_form_id' => $formId , 'options_id' => $question->id );
        //     $relation = RegistrationFormsOptions::all()->where($where)->first();
        //     $values = $relation->values()->get();
        //     $QandA = array(
        //         'question' => $question , 
        //         'values' => $values
        //     );
        //     array_push($AllQandA, $QandA);
        // }
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
    
    public function calcAge($birthDate)
    {
  
        //date in mm/dd/yyyy format; or it can be in other formats as well
        // $birthDate = "12/17/1983";
        //explode the date to get month, day and year
        $birthDate = explode("-", $birthDate);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
            ? ((date("Y") - $birthDate[2]) - 1)
            : (date("Y") - $birthDate[2]));
        return $age;
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
