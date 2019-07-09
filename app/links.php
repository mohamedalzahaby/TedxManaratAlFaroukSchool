<?php
include('model\DBHelper.php');
require_once('app\interface\Icrud.php');
class Links extends DBHelper implements Icrud
{  
    private $physicalName;
    private $friendlyName;
   


    public function __construct()
    {
        $this->tableName = 'links';
        $this->culomnNamesArr = array('physicalName', 'friendlyName');
    } 
    public function store($request)
    {
        $this->physicalName = $request['physicalName'];
        $this->friendlyName = $request['friendlyname'];
        $this->culomnValuesArr = array($this->physicalName , $this->friendlyName);
        $this->insert($this->culomnNamesArr,$this->culomnValuesArr , $this->tableName);
    }
    public function newStore($array)
    {
        foreach ($array as $phys => $friendly) {
            $this->culomnValuesArr = array( $phys , $friendly);
            $this->insert($this->culomnNamesArr,$this->culomnValuesArr , $this->tableName);
        }
        
    }
    
    public function getPhysicalName($linkName)
    {
        $this->friendlyName = $linkName;
        $physicalName = $this->getByColumn($this->tableName, 'friendlyName' , $this->friendlyName , 'physicalName');
        return $physicalName;
    }
    public function getfriendlyName($linkName)
    {
        $this->physicalName = $linkName;
        getByColumn($this->tableName, 'physicalName' , $this->physicalName , 'friendlyName');
    }

    public function update($request){}
    public function delete($request){}
    public function search($request){}
    

    
        
}
