<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    private $jobDescribtion;
    private $boardId;
    protected $table;
    protected $board_id =  'boardId';

 function __construct()
 {

        $this->table = 'Department';
       


    }
    public function board()
    {
        return $this->belongsTo('App\board');
    }

    public function getColumnData($columnName)
    {
        return $this->getData($this->tableName ,  $columnName );
    }

    public function getspecificBoardDepartments($boardId)
    {
        $departments = array('id' , 'name');
        $board_Departments = $this->selectWhere($departments , $this->tableName , "`boardId` = $boardId");
        return $board_Departments;
    }





}
