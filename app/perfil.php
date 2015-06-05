<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

	//
    protected $table='perfil';

    protected $fillable=['name','lastname','second_lastname','picture_url','phone','email','cmt_email','address','ife','curp','rfc','birthdate','sexo','civil_status','occupation','license','driver_license','expiration_date','emergency_phone','blood_type','status','perfil'];


    public function getbirthdateAttribute($date){

        return Carbon::parse($date)->format('Y-m-d');
    }
    public function getexpirationDateAttribute($date){

        return Carbon::parse($date)->format('Y-m-d');
    }


}
