<?php
class Options extends DBHelper implements Icrud
{
    private $dataTypeId;
    private $productIds;
    private $registrationFormIds;

    public function __construct($id = '')
    {
        $this->tableName = "options";
        $this->columnNamesArr = array('name','dataTypeId');
        $this->productIds = [];
        $this->registrationFormIds = [];
        if ($id != '') {
            $this->id = $id;
            $row = $this->getAllById($this->tableName , $this->id);
            $this->name = $row[0]["name"];
            $this->dataTypeId = $row[0]['dataTypeId']; 
        }
    }

    public function getFormQuestions($optionId)
    {
        $db = Controller::getInstance();
        $sql = "SELECT * FROM `$this->tableName` WHERE `id` = '$optionId' AND `isdeleted` = 0;";
        $OptionData = $db->queryFetchRowAssoc($sql);
        
        return $OptionData;
    }

    public function store($request)
    {
       $this->name = $request['name'];
       $this->dataType = $request['dataTypeId'];
       $this->columnValuesArr = array( $this->name, $this->dataType); 		
       DBHelper::insert($this->columnNamesArr , $this->columnValuesArr , $this->tableName);

    }
    public function insertProductId($ProductId)
    {
        array_push($this->productIds , $ProductId);
    }
 
    public function insertOptionsData_FromRegisterationForm($request , $FormObj)
    {
        $db = Controller::getInstance();
        // $myRequest = [];
        for ($i=0; $i <$request['ctr'] ; $i++) { 
            $I = $i+1;
            $name = $request["optionName$I"];
            $dataType = $request["OptionType$I"];
            $db->query("  INSERT INTO `options` (`name`,`dataTypeId`) VALUES ('$name' ,'$dataType') "); 
            $FormId = $FormObj->getLastInsertedId();
            $optionId = $this->getLastInsertedId();
            $this->insert_RegistrationFormOptions_RelationData($FormId['LastId'] , $optionId['LastId']);

        }
    }

    public function getLastInsertedId()
    {
        $db = Controller::getInstance();
        $sql = "SELECT MAX(`id`) AS LastId FROM `$this->tableName`";
        $id = $db->queryFetchRowAssoc($sql);
        return $id;
    }
    
    public function insert_RegistrationFormOptions_RelationData($FormId , $optionId)
    {
        $db = Controller::getInstance();
        $db->query("INSERT INTO `registrationformoptions` (`registrationFormId`,`optionId`) VALUES ( $FormId  ,  $optionId ) "); 
    }
    


    public function insertOptionsData($request , $productObj)
    {
        $db = Controller::getInstance();
        // $myRequest = [];
        for ($i=0; $i <$request['ctr'] ; $i++) { 
            $I = $i+1;
            $name = $request["optionName$I"];
            $dataType = $request["OptionType$I"];
            $sql = "INSERT INTO `options` (`name`,`dataTypeId`) VALUES ('$name' ,'$dataType');";
            // die($sql);
            $db->query($sql); 
            $productId = $productObj->getProductId($_POST['name']);
            $optionId = $this->getLastInsertedId();
            $this->insertRelationData($productId['id'] , $optionId['LastId']);

        }
    }
    
    public function insertRelationData($productId , $optionId)
    {
        $db = Controller::getInstance();
        $db->query("  INSERT INTO `productselectedoptions` (`productId`,`optionsId`) VALUES ('$productId' , '$optionId') "); 
    }



    public function getProductOptionId($name)
    {
        return $this->getId($this->tableName , 'name' , $name);
    }
 
    public function getRelatedIds($registrationFormId)
    {
        $arr =[];
        $db = Controller::getInstance();
        $sql = "SELECT `rid` , `optionId` FROM `registrationformoptions` WHERE `registrationFormId` = $registrationFormId;";
        
        $query = $db->query($sql); 
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // for ($i=0; $i <sizeof($data) ; $i++) { 
        //     foreach ($data[$i] as $key => $value) {
        //         array_push($arr , $value);
        //     }
            
        // }
        return $data;
    }
    
    public function getProductRelatedIds($productId)
    {
        $arr =[];
        $db = Controller::getInstance();
        $sql = "SELECT `id` , `optionsId` FROM `productselectedoptions` WHERE `productId` = '$productId';";
        $query = $db->query($sql); 
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    public function getRelationids($productId , $optionId)
    {
        $db = Controller::getInstance();
        $query = $db->query("SELECT `id`  FROM `productselectedoptions` WHERE `productId` = '$productId' && `optionsId` = '$optionId' "); 
        $data = $query->fetch(PDO::FETCH_ASSOC);
      
        return $data;
    }

    public function getById($id)
    {
        return DBHelper::getAllById($this->tableName,$id);
    }

    public function update($request){}
    public function delete($request){}
    public function search($request){}

   
}
