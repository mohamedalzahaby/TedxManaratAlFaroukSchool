<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class board extends Model
{
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
