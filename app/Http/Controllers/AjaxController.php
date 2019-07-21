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
        $ctr = $this->ctr;
        $name = 'OptionType' . $ctr;
        $mystring =   '<p><b>Question name</b></p>';
        $mystring .=   "<input type='text' name='optionName$ctr' placeholder='option name' required>";
        $mystring .=  "<br><br><fieldset><label><b>Question Type</b></label>";
        $mystring .=  "<select id='$name' name='$name' >";

        $mystring .=  '<option value="' . $optionTypes[0]->id . '>' . $optionTypes[0]->name . '</option>';
        $mystring .=  '<option value="' . $optionTypes[1]->id . '>' . $optionTypes[1]->name . '</option>';
        $mystring .=  '<option value="' . $optionTypes[2]->id . '>' . $optionTypes[2]->name . '</option>';
        // foreach ($optionTypes as $key => $option) {
        //     $mystring .=  '<option value="' . $option->id . '>' . $option->name . '</option>';
        // }
        $mystring .=  '</select>';
        $mystring .= " </fieldset><br><br>";
        $value =  "value = '$ctr'";
        $mystring .=  "<input type='text' name ='ctr' $value>";
        ++$this->ctr;
        return response()->json(['success' => $mystring ]);
    }

    public function myajax(Request $request)
    {

        $msg = '$request->name';

        return response()->json(['success' => 'Data is successfully added']);
    }
}
