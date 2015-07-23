<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily_schedule extends Model {

	//
    protected $table='daily_schedule';

    protected $fillable = array('id_week_schedule_perfil', 'id_location', 'id_guest','event_name','initial_time','end_time','initial_date','end_date','character','active');
}
