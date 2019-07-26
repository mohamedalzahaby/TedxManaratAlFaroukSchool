<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationFormsOptions extends Model
{
    protected $table = 'registrationformoptions';

    public function values()
    {
        return $this->hasMany('App\RegistrationFormOptionsValue');
    }
}
