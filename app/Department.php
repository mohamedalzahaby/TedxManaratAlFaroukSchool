<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'Department';
    protected $board_id =  'boardId';

    function __construct()
    {
        $this->table = 'Department';
    }
    public function board()
    {
        return $this->belongsTo('App\board');
    }
}
