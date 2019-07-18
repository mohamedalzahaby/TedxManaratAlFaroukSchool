<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use DB;
use PDO;
use Illuminate\Support\Facades\Request;

class Product extends Model
{
    protected $table;

    public function __construct()
    {
        $this->table='Product';
    }

    public function store(Request $request)
    {
        $Product=new Product();
        $Product->name = $request->input('name');
        $Product->price=$request->input('price');
        $Product->quantity=$request->input('quantity');
        $Product->save();
        return redirect('addNewProduct')->with('sucess','Product added');
    }
    public function getProductId($name)
    {
       return  DB::select('id')->where('name' , $name)->get();
    }
}
