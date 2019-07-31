<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\UserType;
// include('model\DBHelper.php');
// require_once('app\interface\Icrud.php');
class Links extends Model
{
    protected $table = 'links';
    public function userTypes()
    {
        return $this->belongsToMany('App\UserType');
    }

}

