<?php
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{  
    protected $date;
    protected $eventStart;
    protected $eventEnd;
    protected $addressId;
    protected $academicYearId;
    protected $boardId;
    
    
   
    public function __construct($id = '')
    {
        // $crud = new Icrud;

        if ($id != '') {
            $this->id = $id;
        }
        $this->columnNamesArr = array('name','date','eventStart','eventEnd','description','addressId','academicYearId','boardId');
        $this->tableName ='event';

    }

    public function store($request)
    {
        if (end($request) == 'submit' || end($request) == 'Submit') {
            array_pop($request);
        }
        $newarr = array_values($request);
  
        DBHelper::executeStore($this->columnNamesArr , $newarr , 'event');
    }
    public function getEventsdata()
    {
        return DBHelper::selectAll('event');
    }
    public function getEventsOpenedForRegistering()
    {
        $arr = array( 'id' ,'name' , 'eventStart');
        return DBHelper::selectWhere($arr , $this->tableName , $where = '`isRegisterationOpened` = 1' );
    }
    public function update($request){}
    public function delete($request){}
    public function search($request){}
    

    
        
}
