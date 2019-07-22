<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RegisterationDetails extends Model
{
    protected $registerationId;
    protected $statusId;
    protected $boardId;
    protected $OptionsIds;
    protected $registerAs;//takes userTypeId





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
