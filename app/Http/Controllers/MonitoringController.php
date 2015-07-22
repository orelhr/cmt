<?php namespace App\Http\Controllers;

use App\Daily_schedule;

use App\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Location;
use App\Perfil;
use App\State;
use App\Week_Schedule_Perfil;
use App\WeekSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class MonitoringController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($day = "hoy")
    {
        //
        if($day=="hoy")
            $day= Carbon::now()->toDateString();

        //Get the actual week

        

        // get the actual day.
        $idWeekSchedule= WeekSchedule::whereRaw('STR_TO_DATE("'.$day.'","%Y-%m-%d") between initial_date and  end_date')->first();


        $data= $idWeekSchedule;
        // Get the Enlaces People
        $perfiles= Perfil::where('cmt_email','like','%enlace%')
                            ->where('active','1')->get(array('id','name','lastname','second_lastname'));

        // For each perfil
        foreach($perfiles as $perfil){


            // Select the state where the perfil is active  That is an array
            $perfil->states= State::join('state_perfil','state.id','=','state_perfil.id_state')
                                    ->join('perfil','state_perfil.id_perfil','=', 'perfil.id')
                                    ->where('state_perfil.active','1')
                                    ->where('perfil.id',$perfil->id)
                                    ->distinct('state.name')->select('state.name','state.description')->get();

            // Select the id and agenda status
            $perfil->week_schedule= Week_Schedule_Perfil::where('id_perfil',$perfil->id)
                                                        ->where('id_week_schedule',$idWeekSchedule->id)->select('id','active')->first();
            // Get the status and select their meaning
            
            $perfil->active= $this->getStatus($perfil->week_schedule->active);


            // Count  Dayle Schedules from day.
            $perfil->sunday = Daily_schedule::where('id_week_schedule_perfil',$perfil->week_schedule->id)
                                    ->where('initial_date',$idWeekSchedule->initial_date)->count();

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

        return view('monitoring.show',compact(array('data','perfiles','day')));
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

        //getdays

        $week_schedule->sunday= Carbon::parse($week_schedule->initial_date)->format('Y-m-d');
        $week_schedule->monday= Carbon::parse($week_schedule->initial_date)->addDay()->format('Y-m-d');
        $week_schedule->tuesday= Carbon::parse($week_schedule->initial_date)->addDays(2)->format('Y-m-d');
        $week_schedule->wednesday= Carbon::parse($week_schedule->initial_date)->addDays(3)->format('Y-m-d');
        $week_schedule->thursday= Carbon::parse($week_schedule->initial_date)->addDays(4)->format('Y-m-d');
        $week_schedule->friday= Carbon::parse($week_schedule->initial_date)->addDays(5)->format('Y-m-d');
        $week_schedule->saturday= Carbon::parse($week_schedule->initial_date)->addDays(6)->format('Y-m-d');
        

        // get perfil model , the perfil.name is used in t view
        $perfil = Perfil::where('id',$idperfil->id_perfil)->first();

        $initial_date= WeekSchedule::where('id',$idperfil->id_week_schedule)->first();


        //Id week_schedule
        $perfil->sunday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->where('initial_date',$initial_date ->initial_date)->get();
        $perfil->monday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->whereRaw("initial_date = DATE_ADD( '" . $initial_date ->initial_date."' ,INTERVAL 1 DAY )")->get();
        $perfil->tuesday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->whereRaw("initial_date = DATE_ADD( '" . $initial_date ->initial_date."' ,INTERVAL 2 DAY )")->get();
        $perfil->wednesday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->whereRaw("initial_date = DATE_ADD( '" . $initial_date ->initial_date."' ,INTERVAL 3 DAY )")->get();
        $perfil->thursday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->whereRaw("initial_date = DATE_ADD( '" . $initial_date ->initial_date."' ,INTERVAL 4 DAY )")->get();
        $perfil->friday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->whereRaw("initial_date = DATE_ADD( '" . $initial_date ->initial_date."' ,INTERVAL 5 DAY )")->get();
        $perfil->saturday =Daily_schedule::where('id_week_schedule_perfil',$id)
            ->whereRaw("initial_date = DATE_ADD( '" . $initial_date ->initial_date."' ,INTERVAL 6 DAY )")->get();

        // add state to the model
        foreach($perfil->sunday as $sun){

            $sun->state= Location::where('id',$sun->id_location)->first();
        }    
        foreach($perfil->monday as $mon){

            $mon->state= Location::where('id',$mon->id_location)->first();
        }
        foreach($perfil->tuesday as $tue){

            $tue->state= Location::where('id',$tue->id_location)->first();
        }
        foreach($perfil->wednesday as $wed){

            $wed->state= Location::where('id',$wed->id_location)->first();
        }
        foreach($perfil->thursday as $thu){

            $thu->state= Location::where('id',$thu->id_location)->first();
        }
        foreach($perfil->friday as $fri){

            $fri->state= Location::where('id',$fri->id_location)->first();
        }
        foreach($perfil->saturday as $sat){

            $sat->state= Location::where('id',$sat->id_location)->first();
        }

    //    session()->flash('idperfil',$idperfil);




        //dd($perfil);

        //return view('monitoring.week', compact(array('perfil','dailyschedule','week_schedule')));
        return view('monitoring.weekview',compact(array('perfil','dailyschedule','week_schedule','id')));
    }
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createappointment($day,$id)
	{
		
        //$idperfil= session()->get('idperfil');
        return view('monitoring.createappointment',compact(array('day','id')));
	}

    /**
     * Store a newly created resource in storage. Store Appointment
     *
     * @param $day
     * @param $id
     * @param Request $request
     * @return Response
     */
	public function store($day, $id, Request $request)
	{

        dd($request->all());
		//the next switch makes the model validation for each case : firstMeeting, FollowingMeeting or AgreementMeeting
        switch($request->input('character')){

            case "first":
                $this->validate($request, [
                      "initial_time" => "required",
                      "end_time" => "required",
                      "event_name" => "required",
                      "character" => "required",
                      "location"=> "required",
                      "guestType" => "required",
                      "name" => "required",
                      "address" => "required",
                      "phone" => "required",
                      "celphone" => "required",
                      "nameguest" => "required",
                      "lastname" => "required",
                      "secondlastname" => "required",
                      "email" => "required",
                      "charge" => "required",
                      "personalphone" => "required",
                      "personalemail" => "required"]);

                //if the validation passes we create the guest schema and after that the dailyschedule

                $guest['name']= $request->input('nameguest');
                $guest['lastname']= $request->input('lastname');
                $guest['second_lastname']= $request->input('secondlastname');
                $guest['charge']= $request->input('charge');
                $guest['address']= $request->input('address');
                $guest['phone']= $request->input('phone');
                $guest['name']= $request->input('nameguest');
                $guest['email']= $request->input('email');
                $guest['name']= $request->input('nameguest');
                $guest['initial_date']= Carbon::now()->format('Y-m-d');
                $guest['end_date']=Carbon::now()->format('Y-m-d');
                $guest['active']="1";
                //should be actualized with the dynamic guestTypes in the schema
                $guest['id_guest_type']=$request->input('guestType')=="townGroup" ? "1": "2";


                Guest::create($guest);

                $group['name']= $request->input('name');
                $group['address']=$request->input('address');
                $group['phone']

                $daily_schedule['id_week_schedule_perfil']=$id;
                $daily_schedule['id_location']=$request->input('location');
                $daily_schedule['id_guest']= Guest::where('name',$request->input('name'))->last()->select('id');
                $daily_schedule['event_name']=$request->input('event_name');
                $daily_schedule['initial_date']=Carbon::now()->format('Y-m-d');
                $daily_schedule['initial_time']=$request->input('initial_time');
                $daily_schedule['end_time']=$request->input('end_time');
                $daily_schedule['character']=$request->input('character');

                Daily_schedule::create($daily_schedule);



                flash()->success("Agenda diaria creada");


                break;
            case "following":
                break;
            case "agreement":
                break;
            default:


        }
            dd($request);
         $input = $request->all();
        // dd($input);

         return redirect('monitoring');
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
