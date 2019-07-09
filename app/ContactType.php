<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
#include('model/Model');

class ContactType extends Model
{


    public function __construct()
    {
        $this->tableName = 'contactType';
        $this->columnNamesArr = array();
    }


    public function store($request){}
    public function update($request){}
    public function delete($request){}
    public function search($request){}


    
}
