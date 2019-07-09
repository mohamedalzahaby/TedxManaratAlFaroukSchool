<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class ProductOptionsValue extends Model 
{
    private $value;
    private $PrOPId;
    private $purchaseId;

    public function __construct()
    {
        $this->tableName = "productoptionsvalue";
        $this->columnNamesArr = array('value', 'productSelectedOptionsId', 'purchaseId');
    }
    public function insertValues( $prOpIdsArr , $request)
    {
        // var_dump($prOpIdsArr); echo "<br>";
        // var_dump($request); die();
        $db = Controller::getInstance();
        $ctr=0;
        foreach ($request as $key => $value) {
            if ($value != 'next') {
                if (is_string($value)) {
                    $value ="'$value'";
                }
                $this->value = $value;
                $this->PrOPId = $prOpIdsArr[$ctr];
                $this->purchaseId = 1;
                
                $sql = "INSERT `productoptionsvalue` (`value`, `productSelectedOptionsId`, `purchaseId`)
                        VALUES($this->value , $this->PrOPId , $this->purchaseId )";
                $db->query($sql);
                $ctr++;
            }
        }
    }

    public function Invoice($purchaseId)
    {
        $db = Controller::getInstance();
        $sql = "SELECT o.`name` , `value` , `purchaseId` 
            FROM `productoptionsvalue` 
            INNER JOIN `productselectedoptions`po 
            ON `productSelectedOptionsId` = po.`id` 
            INNER JOIN `options`o 
            ON po.`optionsId` = o.`id` WHERE `purchaseId` = $purchaseId ";
        return $db->queryFetchAllAssoc($sql);
    }

    public function store($request)
    {
        # code...
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
