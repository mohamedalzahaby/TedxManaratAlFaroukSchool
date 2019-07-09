<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public function getData($id,$columname){
    $Columns= array('id',$columname);
    $data = ProductType::select($Columns)->where('isdeleted', 0)->get();
    return $data;
}
}
