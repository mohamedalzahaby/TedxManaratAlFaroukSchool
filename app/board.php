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
