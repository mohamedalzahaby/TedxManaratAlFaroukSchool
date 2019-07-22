<?php

namespace App;
use DB;
use PDO;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $table = 'academicYear';
    public function getAcademicYears()
    {
        $array =  DB::table('academicYear')->select('name')->get();
        $academicYears = [];
        foreach ($array as $key => $value) {
            $array2 = (array) $value;
            $boardName = $array2['name'];
           array_push($academicYears , $boardName);
        }
        return $academicYears;
    }

    public function CurrentAcademicYear()
    {
        # code...
    }
}
