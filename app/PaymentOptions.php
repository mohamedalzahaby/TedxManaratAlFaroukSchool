<?php 
include('product\DBHellper.php');

class PaymentOptions extends DBHelper implements Icrud
{
    private $dataType;

    public function __construct()
    {
        $this->tableName = 'PaymentOptions';
        $this->columnNamesArr = array('id' , 'name' , 'dataType');
    }

    public function store($request){}
    public function update($request){}
    public function delete($request){}
    public function search($request){}

}
