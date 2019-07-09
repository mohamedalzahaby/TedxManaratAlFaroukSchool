<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

// include('product\DBHellper.php');

class PaymentMethodOptionValue extends Model 
{
    public function __construct()
    {
        $this->tableName = 'paymentMethodOptionValue';
        $this->columnNamesArr = array('paymentMethodOptionId' , 'purchaseId' , 'value');
    }

    public function store($request){}
    public function update($request){}
    public function delete($request){}
    public function search($request){}
}
