<?php

class ProductType extends DBHelper implements Icrud
{
    
    private $columnName;
    public function __construct(){
        $this->tableName = 'ProductType';
    }

    public function getColumnData($columnName)
    {   
        //returns an array of id and column values
        return $this->getData($this->tableName , $columnName);
    }
    
    public function getAllTypes()
    {   
        //returns an array of id and names
        return $this->getData($this->tableName , 'name');
    }


   public function store($request)
   {
       $this->name = $request['productType'];
       $db = Controller::getInstance();
       $sql =  "INSERT INTO `producttype`(`name`, `parentId`) VALUES ('$this->name' , 0)";
       $db->query($sql);
   }

   public function update($request)
    {
        # code...
    }
    public function delete($request)
    {
        # code...
    }
    public function search($request)
    {
        # code...
    }


    
}
