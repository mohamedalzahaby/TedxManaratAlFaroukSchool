<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
include('product\DBHellper.php');

class ContactNumber extends Model
{
    private $contactNumber;
    private $contactTypeId;

    public function __construct()
    {
        $this->tableName = 'contactNumber';
        $this->columnNamesArr = array('contactNumber', 'contactTypeId');
    }

    public function store($request){}
    public function update($request){}
    public function delete($request){}
    public function search($request){}


    
}
