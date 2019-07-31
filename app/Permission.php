<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserType;

class Permission extends Model
{
    public function userTypes()
    {
        return $this->belongsToMany('App\UserType');
    }
}
