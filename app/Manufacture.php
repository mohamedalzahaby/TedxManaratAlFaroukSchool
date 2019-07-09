<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

// include('product\DBHellper.php');

class Manufacture extends Model
{
    private $addressId;
    private $contactNumberId;

    public function __construct()
    {
        $this->tableName = 'manufacture';
        $this->culomnNameArr = array('name' , 'addressId', 'contactNumberId');
    }

    public function store($request){}
    public function update($request){}
    public function delete($request){}
    public function search($request){}    
    
}
