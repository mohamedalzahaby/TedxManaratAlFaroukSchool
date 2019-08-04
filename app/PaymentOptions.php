<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

// include('product\DBHellper.php');

class PaymentOptions extends Model 
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
