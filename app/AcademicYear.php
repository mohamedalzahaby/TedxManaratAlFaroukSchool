<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{


    public function __construct($id = '')
    {
        if ($id!='') {
            $this->id = $id;
        }
        $Academicyear=AcademicYear::all();
        return $Academicyear;

    }


}
