<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

// include('product\DBHellper.php');
class PaymentMethod extends Model 
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