<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    public $eventAddressString;

    public function __construct()
    {
        $this->eventAddressString = NULL;
    }

    public function getEventsOpenedForRegistering()
    {
        $columns = array( 'id' ,'name' , 'eventStart');
        $where = array( 'isRegisterationOpened' => 1 ,'isdeleted' => 0);
        $events =  DB::table($this->table)->select($columns)->where($where)->get();
        return $events;
    }


}
