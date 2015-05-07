<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model {

	//
    protected $table='perfil';

    protected $fillable=['name','lastname','second_lastname','picture_url','phone','email','cmt_email','ife','curp','rfc','birthdate','sexo','civil_status','ocuppation','license','driver_license','expiration_date','emergency_phone','blood_type','status','perfil'];

}
