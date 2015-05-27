<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model {

	//
    protected $table='equipment';

    protected $fillable = ['name', 'branch', 'model','validity','provider_name','provider_phone','purchase_date','serie','description','comments'];

    public function setPurchase_dateAttribute($date){

        $this->attributes['purchase_date']= Carbon::createFromDate('Y-m-d',$date);
    }
    public function getPurchaseDateAttribute($date){

        return Carbon::parse($date)->format('Y-m-d');
    }



}
