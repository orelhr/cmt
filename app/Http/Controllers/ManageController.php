<?php namespace App\Http\Controllers;

use App\Equipment_Assignment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Perfil;
use Illuminate\Http\Request;

class ManageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		//Muestra los activos por perfil

        $perfil= Perfil::find($id);
		dd($perfil);
        return view('manage.index', compact('perfil'));



	}

	/**
	 * Show the equipment of the people
	 * @param $id
     */
	public function showequipment($id){

		$eassignment= Equipment_Assignment::where('id_perfil',$id)->get();

		dd($eassignment);

		return view('manage.showequipment', compact('eassignment'));
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
