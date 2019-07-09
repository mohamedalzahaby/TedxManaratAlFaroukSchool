<?php
require_once('model\DBHelper.php');
require_once('app\interface\Icrud.php');
class ProductOptions extends DBHelper implements Icrud
{
    private $dataType;
    private $productIds;

    public function __construct()
    {
        $this->tableName = "productoptions";
        $this->columnNamesArr = array('name','dataType');
        $this->productIds = [];
    }

    public function store($request)
    {
       $this->name = $request['name'];
       $this->dataType = $request['dataType'];
       $this->columnValuesArr = array( $this->name, $this->dataType); 		
       DBHelper::insert($this->columnNamesArr , $this->columnValuesArr , $this->tableName);

    }
    public function insertProductId($ProductId)
    {
        array_push($this->productIds , $ProductId);
    }
 
    public function insertOptionsData($request , $productObj)
    {
        $db = Controller::getInstance();
        // $myRequest = [];
        for ($i=0; $i <$request['ctr'] ; $i++) { 
            $I = $i+1;
            $name = $request["optionName$I"];
            $dataType = $request["OptionType$I"];
            $db->query("  INSERT INTO `productoptions` (`name`,`dataType`) VALUES ('$name' ,'$dataType') "); 
            $productId = $productObj->getProductId($_POST['name']);
            $optionId = $this->getProductOptionId($name);
            $this->insertRelationData($productId['id'] , $optionId['id']);

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

    public function getRelatedIds($productId)
    {
        $arr =[];
        $db = Controller::getInstance();
        $query = $db->query("SELECT `id` , `optionsId` FROM `productselectedoptions` WHERE `productId` = '$productId' "); 
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        // for ($i=0; $i <sizeof($data) ; $i++) { 
        //     foreach ($data[$i] as $key => $value) {
        //         array_push($arr , $value);
        //     }
            
        // }
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
