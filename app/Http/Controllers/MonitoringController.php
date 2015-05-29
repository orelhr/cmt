<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Perfil;
use App\State;
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


        $perfiles= State::leftjoin('state_perfil','state.id','=','state_perfil.id_state')
                            ->join('perfil','state_perfil.id_perfil','=','perfil.id')
                            ->where('perfil.active','1')
                            ->where('perfil.status','1')
                            ->where('state_perfil.active','1')
                            ->where('perfil.cmt_email','like','%enlace%')
                            ->groupBy('perfil.id')
                            ->orderBy('state.description')->get();

        //dd($info);

       // dd($data);

        return view('monitoring.index',compact(array('data','perfiles')));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
