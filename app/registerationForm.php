<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;

class RegisterationForm extends Model
{

    protected $table = 'registerationform';
    // protected $registrationFormTypeId;
    // protected $registerAs;
    // protected $isRegistrationClosed;
    // protected $OptionsIds;
    // protected $eventIds;
    // protected $departmentIds;




    public function events()
    {
        return $this->belongsToMany('App\Event'  , 'eventform');
    }

    public function departments()
    {
        return $this->belongsToMany('App\Department');
    }

    public function options()
    {
        return $this->belongsToMany('App\Options' , 'registrationformoptions');
    }


    public function getOpenedForms()
    {
        $Columns = array('id','name');
        $where = array('isdeleted'=> 0 , 'isRegistrationClosed'=> 0  );
        $availableForms = DB::table($this->table)->select($Columns)->where($where)->get();
        return $availableForms;
    }





}
