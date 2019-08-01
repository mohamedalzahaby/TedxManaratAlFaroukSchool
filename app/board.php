<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Board extends Model
{
    protected $table = 'board';
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
