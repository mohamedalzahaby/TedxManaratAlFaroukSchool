<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\UserType;
use App\Permission;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getCertainColumns($tableName , $Columns)
    {
        $data = DB::table($tableName)->select($Columns)->where('isdeleted', 0)->get();
        return $data;
    }

    public function selectTag($id , $name , $optionData , $optionDataValue , $optionDataName , $class = '' )
	{
		echo "<select id='$id' name='$name' $class>";
        foreach ($optionData as $key => $option)
        {
			echo '<option value="'.$option->$optionDataValue.'>'.$option->$optionDataName.'</option>';
		}
		echo '</select>';
    }


    public function autherization( $permissionName , $url = '/contact')
    {
        $redirect = true;
        $userTypeId = auth()->user()->userTypeId;
        $permission = Permission::all()->where('name' , $permissionName )->first();
        $userTypes = $permission->userTypes()->get();
        foreach ($userTypes as $key => $value) {
            if ($value->id == $userTypeId) {
                $redirect = false;
            }
        }
        // dd($redirect);
        if($redirect) { return redirect($url)->with('error' , 'Unauthorized Page');}
    }

}
