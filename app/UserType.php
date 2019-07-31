<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Permission;

class UserType extends Model
{
    protected $table = 'UserType';
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }
    public function links()
    {
        return $this->belongsToMany('App\links');
    }

}
