<?php namespace App\Http\Controllers;

use App\Auto;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Policy;
use Illuminate\Http\Request;

class AutoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $autos= Auto::all();

        return view('auto.index',compact('autos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $policies= Policy::lists('number');


        return view('auto.create',compact('policies'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\AutoRequest $request)
	{
		//
        Auto::create($request->all());

        return redirect('auto');
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
        $auto= Auto::findOrFail($id);

        return view('auto.show', compact('auto'));
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
        $auto= Auto::findOrFail($id);

        return view('auto.edit', compact('auto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\AutoRequest $request)
	{
		//
        $auto=Auto::find($id);

        $auto->update($request->all());

        return redirect('auto');
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
