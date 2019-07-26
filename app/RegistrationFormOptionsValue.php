<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class RegistrationFormOptionsValue extends Model
{
    protected $table = "registrationformoptionsvalue";

    public function __construct()
    {
        $this->table = "registrationformoptionsvalue";
    }

    public function RegistrationFormsOptions()
    {
        return $this->belongsTo('App\RegistrationFormsOptions');
    }







}
