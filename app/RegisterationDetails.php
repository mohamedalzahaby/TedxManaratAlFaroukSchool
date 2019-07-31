<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Registeration;
class RegisterationDetails extends Model
{
    protected $table = 'registerationdetails';


    public function registrations()
    {
        return $this->belongsTo('App/Registeration');
    }


}
