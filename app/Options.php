<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    public function insertOptionsData(Request $request , $productObj)
    {
        $option=new Options();
        $productObj=new Product();
        for ($i=0; $i <$request['ctr'] ; $i++) {
            $I = $i+1;
            $optionName = "optionName$I";
            $OptionType = "OptionType$I";
            $name = $request[$optionName];
            $dataType = $request[$OptionType];
            $option->name = $request->input($name);
            $option->dataTypeId = $request->input($dataType);
            $option->save();
            // die($sql);
            $productId = $productObj->getProductId($request['name']);
            $optionId = $this->getLastInsertedId();
            $this->insertRelationData($productId['id'] , $optionId['LastId']);

        }

        // for ($i=0; $i <$request['ctr'] ; $i++) {
        //     $I = $i+1;
        //     $option->name=$request->input('name');
        //     $option->dataTypeId=$request->input('dataTypeId');
        //     $option->save();


        //     $productId = $productObj->getProductId($_POST['name']);
        //     $optionId = $this->getLastInsertedId();
        //     $this->insertRelationData($productId['id'] , $optionId['LastId']);

        // }
    }
}
