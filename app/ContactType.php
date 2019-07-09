<?php
include('model/Model');

class ContactType extends DBHelper implements Icrud
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
