<?php namespace App\Http\Controllers;

use App\Equipment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;


class EquipmentController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$equipments= Equipment::all();

        return view('equipment.index',compact('equipments'));
		//


        /*
        $equipments= Equipment::leftjoin('equipment_assignment',function($join){
            $join->on('equipment.id','=','equipment_assignment.id');

        })->first();
            /*
            ->leftjoin('perfil',function($join){

            $join->on('equipment_assignment.id','=','perfil.id');

        })->where('equipment.active','=!',0)->and('assignment.active','is null ')->get();


        return view('equipment.index', compact('equipments'));

            */
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('equipment.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    // We call the validation method for equipment
	public function store(Requests\CreateEquipmentRequest $request)
	{
		//

        Equipment::create($request->all());

        return redirect('equipment');
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
        $equipment= Equipment::find($id);
        return view('equipment.show', compact('equipment'));
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
        $equipment= Equipment::findOrFail($id);
        return view('equipment.edit',compact('equipment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\CreateEquipmentRequest $request)
	{
		//

        $equipment= Equipment::findOrFail($id);
        $equipment->update($request->all());

        return redirect('equipment');
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
