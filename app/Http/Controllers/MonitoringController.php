<?php namespace App\Http\Controllers;

use App\Daily_schedule;
use App\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\Perfil;
use App\State;
use App\Country;
use App\Guest_type;
use App\City;
use App\Group;
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
                            ->where('active','1')->get(array('id','name','lastname','second_lastname','picture_url'));

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
            case 4: return "P   ara ser Autorizada";
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

       // dd($request->all());
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
                      "nameguest" => "required",
                      "lastname" => "required",
                      "secondlastname" => "required",
                      "email" => "required",
                      "charge" => "required",
                      "personaladdress" => "required",
                      "personalphone" => "required",
                      "personalemail" => "required"]);

                //if the validation passes we create the guest schema and after that the dailyschedule

                $guest['name']= $request->input('nameguest');
                $guest['lastname']= $request->input('lastname');
                $guest['second_lastname']= $request->input('secondlastname');
                $guest['charge']= $request->input('charge');
                $guest['address']= $request->input('personaladdress');
                $guest['phone']= $request->input('personalphone');
                $guest['email']= $request->input('personalemail');
                $guest['active']="1";
                //should be actualized with the dynamic guestTypes in the schema
                
                $guest['id_guest_type']=$request->input('guestType')=="townGroup" ? "1": "2";


                Guest::create($guest);

                $group['id_location']=$request->input('location');
                $idguest=Guest::Where('name', $request->input('nameguest'))->orderBy('updated_at', 'desc')->select('id')->first();    
              
                $group['id_guest']= $idguest->id;
                $group['name']= $request->input('name');
                $group['address']=$request->input('address');
                $group['phone']=$request->input('phone');
                $group['ext']=$request->input('ext');
                $group['phone2']=$request->input('phone2');
                $group['ext2']=$request->input('ext2');
                $group['email']=$request->input('email');
                $group['active']="1";

                
                Group::create($group);

                $daily_schedule['id_week_schedule_perfil']=$id;
                $daily_schedule['id_location']=$request->input('location');
                $daily_schedule['id_guest']= $idguest->id;
                $daily_schedule['event_name']=$request->input('event_name');
                $daily_schedule['initial_time']=$request->input('initial_time');
                $daily_schedule['initial_date']=$day;                
                $daily_schedule['end_date']=$day;
                $daily_schedule['end_time']=$request->input('end_time');
                $daily_schedule['character']=$request->input('character');
                $daily_schedule['active']="1";
                $daily_schedule['completed']="0";

                Daily_schedule::create($daily_schedule);



                flash()->success("Agenda diaria creada");


                break;
            case "following":
                break;
            case "agreement":
                break;
            default:


        }
          
        
        // dd($input);

         return redirect('monitoring/week/'.$id);
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
        $daily= Daily_schedule::find($id);

        $guest= Guest::find($daily->id_guest);

        $location=Location::find($daily->id_location);

        $city=City::Where('id',$location->id_city)->first();


        $state=State::Where('id',$city->id_state)->first();
       

        $group= Group::Where('id_location',$location->id)->Where('id_guest',$guest->id)->first();

        $guest_type = Guest_type::Where('id',$guest->id_guest_type)->first();


        return view('monitoring.showappointment', compact(array('daily','guest','group','city','state','location','guest_type')));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// we take daily as our model and we build it
        $daily= Daily_schedule::find($id);

        $guest= Guest::find($daily->id_guest);
        $daily['guestname']=$guest->name;
        $daily['lastname']=$guest->lastname;
        $daily['secondlastname']=$guest->second_lastname;
        $daily['charge']=$guest->charge;
        $daily['personaladdress']=$guest->address;
        $daily['personalphone']=$guest->phone;
        $daily['personalemail']=$guest->email;
        


        $location=Location::find($daily->id_location);
        $daily['location']= $location->name;
        $city=City::Where('id',$location->id_city)->first();
        $daily['city']=$city->name;
        $state=State::Where('id',$city->id_state)->first();
        $daily['state']= $state->name;
        $country=Country::Where('id', $state->id_country)->first();

        $group= Group::Where('id_location',$location->id)->Where('id_guest',$guest->id)->first();

        $daily['name']=$group->name;
        $daily['address']=$group->address;
        $daily['phone']=$group->phone;
        $daily['ext']=$group->ext;
        $daily['email']= $group->email;
        $daily['phone2']=$group->phone2;
        $daily['ext2']=$group->ext2;    
        $guest_type = Guest_type::Where('id',$guest->id_guest_type)->first();

        $daily['date']= Carbon::parse($daily->initial_date)->format('Y-m-d');

        return view('monitoring.editappointment', compact(array('daily','guest', 'group','city','state','location','guest_type','id')));

        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($day, $id, Request $request)
	{
		//  dd($request->all());
        //the next switch makes the model validation for each case : firstMeeting, FollowingMeeting or AgreementMeeting

        $destination_path=public_path().'/img/';
        $filename='';
       
       
        switch($request->input('character')){

            case "first":

                $this->validate($request, [
                     // "file" => "required",
                      "initial_time" => "required",
                      "end_time" => "required",
                      "event_name" => "required",
                      "character" => "required",
                      "location"=> "required",
                      "guestType" => "required",
                      "name" => "required",
                      "address" => "required",
                      "phone" => "required",
                      "guestname" => "required",
                      "lastname" => "required",
                      "secondlastname" => "required",
                      "email" => "required",
                      "charge" => "required",
                      "personaladdress" => "required",
                      "personalphone" => "required",
                      "personalemail" => "required"]);

                //if the validation passes we create the guest schema and after that the dailyschedule
                if($request->hasFile('file')){

                     $file= $request->file('file');
                     $filename= str_random(6).'_'.$file->getClientOriginalName();
                     $upluadsucess= $file->move($destination_path,$filename);
                    
                     $daily_schedule['file']=$filename;
                    // dd($guest);
                }

                $guest['name']= $request->input('guestname');
                $guest['lastname']= $request->input('lastname');
                $guest['second_lastname']= $request->input('secondlastname');
                $guest['charge']= $request->input('charge');
                $guest['address']= $request->input('personaladdress');
                $guest['phone']= $request->input('personalphone');
                $guest['email']= $request->input('personalemail');
                $guest['active']="1";
                //should be actualized with the dynamic guestTypes in the schema
                $guest['id_guest_type']=$request->input('guestType')=="townGroup" ? "1": "2";

                $daily= Daily_schedule::findOrFail($id);

                $updateguest= Guest::findOrFail($daily->id_guest);
                
                $updateguest->update($guest);

                $group['id_location']=$request->input('location');
                
                $group['id_guest']= $daily->id_guest;
                $group['name']= $request->input('name');
                $group['address']=$request->input('address');
                $group['phone']=$request->input('phone');
                $group['ext']=$request->input('ext');
                $group['phone2']=$request->input('phone2');
                $group['ext2']=$request->input('ext2');
                $group['email']=$request->input('email');
                $group['active']="1";

                $updategroup= Group::Where('id_location',$daily->id_location)->Where('id_guest',$daily->id_guest)->first();
              //  dd($updategroup);
                $groupmodel= Group::findOrFail($updategroup->id);
                $groupmodel->update($group);

                $daily_schedule['id_week_schedule_perfil']=$daily->id_week_schedule_perfil;
                $daily_schedule['id_location']=$request->input('location');
                $daily_schedule['id_guest']= $daily->id_guest;
                $daily_schedule['event_name']=$request->input('event_name');
                $daily_schedule['initial_time']=$request->input('initial_time');
                $daily_schedule['initial_date']=$day;                
                $daily_schedule['end_date']=$day;
                $daily_schedule['end_time']=$request->input('end_time');
                $daily_schedule['character']=$request->input('character');
                $daily_schedule['active']="1";
                $daily_schedule['completed']="0";

               
                $daily->update($daily_schedule);



                flash()->success("Agenda diaria actualizada");


                break;
            case "following":
                break;
            case "agreement":
                break;
            default:


        }
          
        
        // dd($input);

         return redirect('monitoring/week/'.$daily->id_week_schedule_perfil);
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
