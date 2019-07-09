<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RegisterationForm extends Model
{

    protected $registrationFormTypeId;
    protected $registerAs;
    protected $isRegistrationClosed;
    protected $OptionsIds;
    protected $eventIds;
    protected $departmentIds;

    public function __construct($id = '')
    {
        $this->tableName = 'registerationform';
        $this->columnNamesArr = array('name' , 'registrationFormTypeId', 'registerAs' );
        if ($id != '') {
            $this->id = $id;
            $row = $this->getAllById($this->tableName,$this->id);
            $this->name = $row[0]['name'];
            $this->registrationFormTypeId = $row[0]['registrationFormTypeId'];
            $this->registerAs = $row[0]['registerAs'];
            $this->isRegistrationClosed = $row[0]['isRegistrationClosed'];
            $this->setOptionIds($this->id);
            $this->setEventIds($this->id);
            $this->setDepartmentIds($this->id);
        } 
    }

    public function getRegistrationFormName($formId)
    {
        $db = Controller::getInstance();
        $sql = "SELECT `name` FROM `$this->tableName` WHERE `id` = $formId";
        $name = $db->queryFetchRowAssoc($sql);
        return $name;
    }
    
    public function getFormName()
    {
        $availableForms = $this->$this->getAllById($this->tableName,$this->id);
        return $availableForms;
    }
    public function getOpenedForms()
    {
        $all = array('id','name');
        $availableForms = $this->selectWhere($all , $this->tableName , 'isRegistrationClosed = 0');
        return $availableForms;
    }
    public function getOpenedFormByFormType($formTypeId)
    {
        // $all = array('name');
        // $availableForms = $this->selectWhere($all , $this->tableName , 'isRegistrationClosed = 0');

        $db = Controller::getInstance();
        $sql = "SELECT `id`,`name` FROM `$this->tableName` 
        WHERE `registrationFormTypeId` = $formTypeId 
        AND `isRegistrationClosed` = 0 AND `isdeleted` = 0;";
    
        $formName = $db->queryFetchAllAssoc($sql);
        // var_dump($formName);die();
        return $formName;
    }
    public function getAllOpenedFormWithFormTypeNames()
    {
        // $all = array('name');
        // $availableForms = $this->selectWhere($all , $this->tableName , 'isRegistrationClosed = 0');

        // $db = Controller::getInstance();
        // $sql = "SELECT `name` FROM `$this->tableName` WHERE `registrationFormTypeId` = $formTypeId AND isRegistrationClosed = 0 AND isdeleted = 0;";
        // $formName = $db->queryFetchRowAssoc($sql);
        // return $formName;
        $db = Controller::getInstance();
        $sql = "SELECT f.`id` AS formId , f.`name` , ft.`name` AS typeName 
        FROM `$this->tableName`f
        INNER JOIN `registrationformtype`ft
        ON f.`registrationFormTypeId` = ft.`id` 
        WHERE `isRegistrationClosed` = 0 AND f.`isdeleted` = 0;";
        $formName = $db->queryFetchAllAssoc($sql);
        var_dump($formName);die();
        return $formName;
    }

    public function getEventForm($event)
    {
        $db = Controller::getInstance();
        $sql = "SELECT `formId` FROM `eventForm` WHERE `eventId` = $event";
        $formId = $db->queryFetchRowAssoc($sql);
        $formName = $this->getByColumn($this->tableName , 'id' , $formId , 'name');
        $form = array('id' => $formId , 'name' => $formName );
    }

    public function getLastInsertedId()
    {
        $db = Controller::getInstance();
        $sql = "SELECT MAX(`id`) AS LastId FROM `$this->tableName`";
        $id = $db->queryFetchRowAssoc($sql);
        return $id;
    }

    public function insertOptionId($optionId){
        array_push($this->OptionsIds , $optionId);
        $Model = controller::getInstance();
        $sql = "INSERT INTO `registrationformoptions`(`optionId`) VALUES ($optionId);";
        //  die($sql);
        $query = $Model->query($sql);
    }

    public function setOptionIds($id){
        $this->OptionsIds = Parent::getByColumn('registrationformoptions', 'registrationFormId' , $id , 'optionid');
    }
    public function setEventIds($id){
        $this->OptionsIds = Parent::getByColumn('eventform', 'registerationFormId' , $id , 'eventId');
    }
    public function setDepartmentIds($id){
        $this->OptionsIds = Parent::getByColumn('departmentform', 'registrationFormId' , $id , 'departmentId');
    }
    public function getOptionIdsArray()
    {
        return $this->OptionsIds;
    }
    public function getOptionIds($formID)
    {
        $optionId = array('$optionId');
        $OptionsIds = $this->selectWhere($optionId , `registrationFormOptions` , "registrationFormId = $formID");
        return $OptionsIds;
    }

    

    // public function getAllTypes()
    // {   
    //     //returns an array of id and names
    //     return $this->getData($this->tableName , 'name');
    // }
    

    public function store($request)
    {
        // var_dump($request);die();
        $this->name = $request['name'];
        $this->registrationFormTypeId = $request['registerationFormTypeId'];
        $this->registerAs = $request['RegisterAs'];
        $this->columnValuesArr = array($this->name ,$this->registrationFormTypeId ,$this->registerAs);
        $this->insert($this->columnNamesArr , $this->columnValuesArr , $this->tableName);
        // $Model = controller::getInstance();
        // $this->name = $request['name'];
        // $name = $this->name;
        // $tableName = $this->tableName;
        // $sql = "INSERT INTO `$tableName`(`name`) VALUES ('$name');";
        // //  die($sql);
        // $query = $Model->query($sql);
    }
    public function update($request){}
    public function delete($request){}
    public function search($request){}


    
}
