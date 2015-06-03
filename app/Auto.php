<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model {

	//
    protected $table='auto';

    protected $fillable=['branch','model','serie','plates','engine_number','accessories','type','details'];

    public function policies(){

        return $this->hasMany('App\Policy');
    }

}
