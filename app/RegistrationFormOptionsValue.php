<?php
class RegistrationFormOptionsValue extends DBHelper 
{
    protected $value;
    protected $RegisterationFormsOptionsId;
    protected $RegisterationDetails;

    public function __construct()
    {
        $this->tableName = "registrationformoptionsvalue";
        $this->columnNamesArr = array('value', 'RegisterationFormsOptionsId', 'RegisterationDetails');
    }

    public function getFormAnswers($optionId , $id , $registrationDetailsId)
    {
        var_dump($registrationDetailsId);
        die();
        $db = Controller::getInstance();
        $registrationformoptionsId = "SELECT `id` 
                                    FROM `registrationformoptions` 
                                    WHERE `optionId` = '$optionId' AND `registerationFormId` = '$id';";
        $valueSQL = "SELECT `vlaue` 
                FROM `registrationFormOptionsValue`
                WHERE `registrationformoptionsId` = $registrationformoptionsId
                AND `registrationDetailsId` = $registrationDetailsId;";
        $query = $db->query($valueSQL);
        $value = $query->fetch(PDO::FETCH_ASSOC);
        return $value;
    }

    public function getRegistrationFormOptionIds($formId , $OptionIdsAndValues,$registrationDetailsId)
    {
        $arrayOfRelationIds = [];
        $db = Controller::getInstance();
        foreach ($OptionIdsAndValues as $optionId => $value) {
            $sql = "SELECT `rid` FROM `registrationformoptions` WHERE `registrationFormId` = $formId AND `optionId` = $optionId;";
            $row = $db->queryFetchRowAssoc($sql);
            // var_dump($sql); die();
            $this->store($row['rid'] , $value , $registrationDetailsId);
        }
    }
   
    public function store($regFormOptId , $value , $registrationDetailsId)
    {
        $db = Controller::getInstance();
        $sql = "INSERT INTO `$this->tableName`(`registrationFormOptionsId`, `value`, `registrationDetailsId`) 
        VALUES ($regFormOptId , '$value' ,$registrationDetailsId)";
        // var_dump($sql); die();
        $db->query($sql);
    }
   

}
