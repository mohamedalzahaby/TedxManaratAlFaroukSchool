<?php
class RegisterationDetails extends DBHelper 
{
    protected $registerationId;
    protected $statusId;
    protected $boardId;
    protected $OptionsIds;
    protected $registerAs;//takes userTypeId
    

    public function __construct($id ='')
    {
        $this->columnNamesArr = array( 'registerationId' , 'boardId','statusId','registrationFormId');
        $this->tableName = 'RegisterationDetails';
        if ($id !='') {
            $this->id = $id;
            $row = Parent::getAllById($this->tableName,$this->id);
            $this->registerationId = $row['registerationId'];
            $this->statusId = $row['statusId'];
            $this->boardId = $row['boardId'];
            $this->registerAs = $row['registerAs'];
            
        }
        
        
    }
    

    public function getBoardId(){
        return $this->boardId;
    }
    public function getStatusId(){
        return $this->statusId;
    }

    public function store($request)
    {
        if (end($request) == 'submit' || end($request) == 'Submit') {
            array_pop($request);
        }
        $columnValuesArr = array_values($request); 
        $this->executeStore($this->columnNamesArr , $columnValuesArr , $this->tableName);
      
    }
    public function getLastInsertedId()
    {
        $db = Controller::getInstance();
        $sql = "SELECT MAX(`id`) AS LastId FROM `$this->tableName`";
        $id = $db->queryFetchRowAssoc($sql);
        return $id;
    }

    public function get_User_specificForm_RegisterationDetailsID($registrationId , $registrationFormId)
    {
        $columnArr = array('id');
        $id =  $this->selectWhere($columnArr,$this->tableName,"`registerationId` = '$registrationId' AND `registrationFormId` = '$registrationFormId'");
        return $id;
    }
}
