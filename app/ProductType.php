<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

    class ProductType extends Model
    {
    protected $table = 'ProductType';

    public function __construct()
    {
        $this->table='ProductType';
    }
    public function getData($columname)
    {
        $Columns= array($columname,'id');
        $data = ProductType::select($Columns)->where('isdeleted', 0)->get();
        return $data;
    }
    }
