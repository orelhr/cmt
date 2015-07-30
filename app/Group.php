<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	//
	protected $table="groups";

	  protected $fillable = array('id_location', 'id_guest', 'name','phone','ext','phone2','ext2','address','email','active');

}
