<?php namespace App\Http\Controllers;

use App\Daily_schedule;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Location;
use App\Perfil;
use App\State;
use App\Week_Schedule_Perfil;
use App\WeekSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MonitoringController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
    {
        //

        $data=WeekSchedule::where('initial_date','<',Carbon::now()->toDateString())
                            ->where('end_date','>' ,Carbon::now()->toDateString())->first();

        $idWeekSchedule= WeekSchedule::whereRaw(" current_date() between initial_date and end_date")->first();


        $perfiles= Perfil::where('cmt_email','like','%enlace%')
                            ->where('active','1')->get(array('id','name','lastname','second_lastname'));
        foreach($perfiles as $perfil){

            $perfil->states= State::join('state_perfil','state.id','=','state_perfil.id_state')
                                    ->join('perfil','state_perfil.id_perfil','=', 'perfil.id')
                                    ->where('state_perfil.active','1')
                                    ->where('perfil.id',$perfil->id)
                                    ->distinct('state.name')->select('state.name','state.description')->get();
            $perfil->week_schedule= Week_Schedule_Perfil::where('id_perfil',$perfil->id)
                                                        ->where('id_week_schedule',$idWeekSchedule->id)->select('id','active')->first();
            $perfil->active= $this->getStatus($perfil->week_schedule->active);

            $perfil->monday =Daily_schedule::where('id_week_schedule_perfil',$perfil->week_schedule->id)
                                    ->whereRaw("initial_date = DATE_ADD( '" . $idWeekSchedule->initial_date ."' ,INTERVAL 1 DAY )")->count();
            $perfil->tuesday =Daily_schedule::where('id_week_schedule_perfil',$perfil->week_schedule->id)
                ->whereRaw("initial_date = DATE_ADD( '" . $idWeekSchedule->initial_date ."' ,INTERVAL 2 DAY )")->count();
            $perfil->wednesday =Daily_schedule::where('id_week_schedule_perfil',$perfil->week_schedule->id)
                ->whereRaw("initial_date = DATE_ADD( '" . $idWeekSchedule->initial_date ."' ,INTERVAL 3 DAY )")->count();
            $perfil->thursday =Daily_schedule::where('id_week_schedule_perfil',$perfil->week_schedule->id)
                ->whereRaw("initial_date = DATE_ADD( '" . $idWeekSchedule->initial_date ."' ,INTERVAL 4 DAY )")->count();
            $perfil->friday =Daily_schedule::where('id_week_schedule_perfil',$perfil->week_schedule->id)
                ->whereRaw("initial_date = DATE_ADD( '" . $idWeekSchedule->initial_date ."' ,INTERVAL 5 DAY )")->count();
            $perfil->saturday =Daily_schedule::where('id_week_schedule_perfil',$perfil->week_schedule->id)
                ->whereRaw("initial_date = DATE_ADD( '" . $idWeekSchedule->initial_date ."' ,INTERVAL 6 DAY )")->count();

        }


       //dd($perfiles);

       // dd($data);

        return view('monitoring.index',compact(array('data','perfiles')));
	}

    public function  getStatus($id){

        switch($id){
            case 0: return "Cambio de Agenda";
            case 1: return "Agenda Nula";
            case 2: return "Revisión Optima";
            case 3: return "Previa Revisión";
            case 4: return "Para ser Autorizada";
        }
    }

    /**
     * @param $id  related to the id_week_schedule_perfil
     */
    public function week($id){



        // get id perfil
        $idperfil= Week_Schedule_Perfil::where('id',$id)->select('id_perfil','id_week_schedule')->first();

        //week scheudle for initail date
        $week_schedule= WeekSchedule::where('id',$idperfil->id_week_schedule)->first();
        // get perfil model , the perfil.name is used in t view
        $perfil = Perfil::where('id',$idperfil->id_perfil)->first();

        $initial_date= WeekSchedule::where('id',$idperfil->id_week_schedule)->first();


        //Id week_schedule
        $perfil->monday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->whereRaw("initial_date = DATE_ADD( '" . $initial_date ->initial_date."' ,INTERVAL 1 DAY )")->get();
        // add state to the model
        foreach($perfil->monday as $mon){

            $mon->state= Location::where('id',$mon->id_location)->first();
        }

        session()->flash('idperfil',$idperfil);



       // dd($perfil->monday);



        return view('monitoring.week', compact(array('perfil','dailyschedule','week_schedule')));

    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($day)
	{
		//
        $idperfil= session()->get('idperfil');
        return view('monitoring.create', compact(array('day',)));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
