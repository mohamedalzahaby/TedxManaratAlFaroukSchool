<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $parentId;

    public function __construct()
    {
        $this->tableName = 'Address';
        $this->columnNamesArr = array('name','parentId');
    }

    public function getWholeAddress($id)
    {
        $AddressNameArr = [];
        $dbObj = Controller::getInstance();
        while ($id != 0) {
            $sql = "SELECT `parentId`, `name` FROM `address` WHERE `id` = '$id' AND `isDeleted`= 0 ";
            $query = $dbObj->query($sql);
            $AddressData = $query->fetch(PDO::FETCH_ASSOC);
            $id = $AddressData['parentId'];
            array_push($AddressNameArr , $AddressData['name']);
        }
        $completeAddressName = implode(" ,", $AddressNameArr);
        return $completeAddressName;
    }

    public function getChilds($id)
    {
        // return Parent::getData($this->tableName , 'name' );
        $Columns = array('id','name');
        $addresses = Parent::selectWhere($Columns , $this->tableName , "`parentId` = $id" );
        return $addresses;
    }
    public function store($request)
    {
        $sql = "INSERT INTO `address`(`name`, `parentId`) VALUES ($request , 3)";
    }
    public function update($request){}
    public function delete($request){}
    public function search($request){}

}
