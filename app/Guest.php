<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model {

	//
    protected $table="guest";

    protected $fillable = array('name', 'lastname', 'second_lastname','charge','address','phone','email','active','id_guest_type');
    

}
