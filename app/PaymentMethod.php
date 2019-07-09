<?php
include('product\DBHellper.php');
class PaymentMethod extends DBHelper implements Icrud
{
    public function __construct()
    {
        $this->tableName = 'paymentMethod';
        $this->$columnNamesArr = array('id','name');
    }

    public function store($request){}
    public function update($request){}
    public function delete($request){}
    public function search($request){}
}