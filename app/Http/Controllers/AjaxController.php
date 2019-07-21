<?php

namespace App\Http\Controllers;

use Illumxinate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\DataType;

class AjaxController extends Controller
{
    protected $ctr;

    public function __construct()
    {
        $this->ctr = 1;
    }



    public function myajaxagain()
    {
        $optionTypes =  DataType::all();
        return response()->json(['optionTypes' => $optionTypes ]);
    }

    public function myajax(Request $request)
    {

        $msg = '$request->name';

        return response()->json(['success' => 'Data is successfully added']);
    }
}
