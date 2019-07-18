<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $parentId;
    protected $table;

    public function __construct()
    {
        $this->table = 'Address';
        $this->columnNamesArr = array('name','parentId');
    }

    public function getWholeAddress($id)
    {
        $Columns = array('parentId','name');
        $AddressNameArr = [];

        while ($id != 0)
        {
            $where = array('id' => $id , 'isDeleted' => 0 );
            $address = Address::select($Columns)->where($where)->get();
            foreach ($address as $key => $value)
            {
                $id = $value['parentId'];
                array_push($AddressNameArr , $value['name']);
            }
        }
        $completeAddressName = implode(", ", $AddressNameArr);
        return $completeAddressName;
    }

    public function store($request)
    {
        $sql = "INSERT INTO `address`(`name`, `parentId`) VALUES ($request , 3)";
    }

}


// object(Illuminate\Database\Eloquent\Collection)
// #1274 (1)
// {
//     ["items":protected]=> array(1)
//     {
//         [0]=> object(App\Address)#1272 (27)
//         {
//             ["parentId":protected]=> NULL
//             ["table":protected]=> string(7) "Address"
//             ["connection":protected]=> string(5) "mysql"
//             ["primaryKey":protected]=> string(2) "id"
//             ["keyType":protected]=> string(3) "int"
//             ["incrementing"]=> bool(true)
//             ["with":protected]=> array(0) { }
//             ["withCount":protected]=> array(0) { }
//             ["perPage":protected]=> int(15)
//             ["exists"]=> bool(true)
//             ["wasRecentlyCreated"]=> bool(false)
//             ["attributes":protected]=> array(2)
//             {
//                 ["parentId"]=> int(0)
//                 ["name"]=> string(5) "Egypt"
//             }
//             ["original":protected]=> array(2)
//             {
//                 ["parentId"]=> int(0)
//                 ["name"]=> string(5) "Egypt"
//             }
//             ["changes":protected]=> array(0) { }
//             ["casts":protected]=> array(0) { }
//             ["dates":protected]=> array(0) { }
//             ["dateFormat":protected]=> NULL
//             ["appends":protected]=> array(0) { }
//             ["dispatchesEvents":protected]=> array(0) { }
//             ["observables":protected]=> array(0) { }
//             ["relations":protected]=> array(0) { }
//             ["touches":protected]=> array(0) { }
//             ["timestamps"]=> bool(true)
//             ["hidden":protected]=> array(0) { }
//             ["visible":protected]=> array(0) { }
//             ["fillable":protected]=> array(0) { }
//             ["guarded":protected]=> array(1) { [0]=> string(1) "*" }
//         }
//     }
// }
