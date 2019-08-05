<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use PDF;
use File;
use Response;
use App\User;
use App\Board;
use App\UserType;
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
    public function showTables($formId)
    {
        $form = RegisterationForm::find($formId);
        $questions = $form->options()->get();
        $All_Users_QandA = [] ;
        $values = [] ;
        $allRegisterationDetails = RegisterationDetails::all()->where('registrationFormId', $formId);
        foreach ($allRegisterationDetails as $key => $RegisterationDetails){
            // select userId where regid id regDetails
            $Registeration = Registeration::find($RegisterationDetails->registerationId);
            $userId = $Registeration->userId;
            $user = User::find($Registeration->userId);
            //get user question and answers
            foreach ($questions as $key => $question){
                $relation = RegistrationFormsOptions::all()->where('registeration_form_id' , $formId)->where('options_id' , $question->id)->first();
                $value = RegistrationFormOptionsValue::all()->where('registration_forms_options_id' ,$relation->rid )->first();
                array_push($values, $value);
            }
            $AllQandA_of_One_User = array(
                'user' => $user ,
                'questions' => $questions,
                'values' => $values
            );
            array_push($All_Users_QandA, $AllQandA_of_One_User);
        }
        return view('pages.showSubmittedForms')
        ->with('All_Users_QandA' , $All_Users_QandA)
        ->with('form',$form)
        ->with('userType', new UserType());
    }
    public function showTableData($formId)
    {
        $form = RegisterationForm::find($formId);
        $questions = $form->options()->get();
        $All_Users_QandA = [] ;
        $values = [] ;
        $allRegisterationDetails = RegisterationDetails::all()->where('registrationFormId', $formId);
        foreach ($allRegisterationDetails as $key => $RegisterationDetails){
            // select userId where regid id regDetails
            $Registeration = Registeration::find($RegisterationDetails->registerationId);
            $userId = $Registeration->userId;
            $user = User::find($Registeration->userId);
            //get user question and answers
            foreach ($questions as $key => $question){
                $relation = RegistrationFormsOptions::all()->where('registeration_form_id' , $formId)->where('options_id' , $question->id)->first();
                $value = RegistrationFormOptionsValue::all()->where('registration_forms_options_id' ,$relation->rid )->first();
                array_push($values, $value);
            }
            $AllQandA_of_One_User = array(
                'user' => $user ,
                'questions' => $questions,
                'values' => $values
            );
            array_push($All_Users_QandA, $AllQandA_of_One_User);
        }

        return $All_Users_QandA;
    }



    public function pdfview(Request $request)
    {
        $data = $request->input();
        array_forget($data , ['_token' , 'submit']);
        $data = [ 'data' => $data];
        $pdf = PDF::loadView('valuespdf' , $data);
        return $pdf->download('pdfview.pdf');
    }



    public function downloadAllPDFs($formId)
    {
        $data = $this->showTableData($formId);
        dd($data);

        //logged in user id
        $id = auth::user()->id;
        //get just filename
        $filename = 'user_Form_Value';
        //get just extension
        $extension = 'pdf';
        foreach ($data as $key => $userData) {
            //fileNameToStore
            $fileName = $filename.'_'.$id.'_'.$key.'_'.time().'.'.$extension;
            $pdf_Html = PDF::loadView('valuespdf' , $userData);
            $path = $pdf_Html->storeAs('public/users_pdf_Files',$fileName);
    //         File::put(public_path('/upload/json/'.$fileName),$data);
	//   return Response::download(public_path('/upload/jsonfile/'.$fileName));


            //upload
        }




        return $pdf->download('pdfview.pdf');
    }
    public function create(){}
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
                $valueTable->registration_forms_options_id = $rid;
                $valueTable->value = $value;
                $valueTable->registrationDetailsId = (integer)$registrationDetailsId;
                $valueTable->save();
            }
        }
    }
    public function show($id){}
    public function edit($id){}
    public function update(Request $request, $id){}
    public function destroy($id){}
}
