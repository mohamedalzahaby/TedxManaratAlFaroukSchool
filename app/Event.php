<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    public $eventAddressString;

    public function __construct()
    {
        $this->eventAddressString = NULL;
    }


}
