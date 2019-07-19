<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use PDO;
class Board extends Model
{
    protected $name;
    protected $table = 'board';
    protected $academicYearId;
    protected $openingDate;
    protected $closingDate;
    protected $BoardImage;
    public function __construct()
    {
        $this->table = 'board';
        $this->columnNamesArr = array('name','academicYearId','openingDate','closingDate');
    }
    public function departments()
    {
        return $this->hasMany('App\Department');
    }
    public function getBoards()
    {
        $array =  DB::table('board')->select('name')->get();
        $boards = [];
        foreach ($array as $key => $value) {
            $array2 = (array) $value;
            $boardName = $array2['name'];
           array_push($boards , $boardName);
        }
        return $boards;
    }
//     public function store($request)
//    {
//        $this->name = $request['name'];
//        $this->academicYearId = $request['academicYearId'];
//        $this->openingDate = $request['openingDate'];
//        $this->closingDate = $request['closingDate'];
//        $this->BoardImage = 'BoardImage';
//        $db = Controller::getInstance();
//        $sql = "INSERT INTO `board`(`name`, `academicYearId`, `openingDate`, `closingDate`)
//        VALUES ('$this->name' , $this->academicYearId , $this->openingDate , $this->closingDate )";
//        $db->query($sql);
//     //    $this->columnValuesArr = array($this->name ,$this->academicYearId, $this->openingDate, $this->closingDate, $this->BoardImage);
//     //    $this->insert($this->columnNamesArr , $this->columnValuesArr , $this->tableName);
//         // $this->price = $request['price'];
//         // $this->quantity = $request['quantity'];
//         // $this->productTypeId = $request['productTypeId'];
// 		// $this->columnValuesArr = array( $this->name, $this->price, $this->quantity, $this->productTypeId);
// 		// $this->insert($this->columnNamesArr , $this->columnValuesArr , $this->tableName);
//     }
   public function returnCurrentBoard()
    {
        $currentDate = date("Y-m-d");
        $where  =  array(
            array('closingDate' , '>' , $currentDate),
            array('isdeleted' ,  '=' , 0 )
         );
        $currentBoardId = DB::table($this->table)->select('id')->where($where)->first();
        return $currentBoardId->id;
    }
}
