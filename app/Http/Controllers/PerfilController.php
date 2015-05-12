<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Perfil;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PerfilController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $perfiles= Perfil::all();

        return view('perfil.index', compact('perfiles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return view('perfil.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\PerfilRequest $request)
	{
		//
        $destination_path=public_path().'/img/';
        $filename='';
        $input =  $request->all();
        $input['status']= '0';
        $input['perfil']= 'enlaces';

        if($request->hasFile('picture_url')){
            $file= $request->file('picture_url');
            $filename= str_random(6).'_'.$file->getClientOriginalName();
            $upluadsucess= $file->move($destination_path,$filename);
        }
        $input['picture_url']=$filename;

        Perfil::create($input);

        return redirect('perfil');
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
        $perfil= Perfil::find($id);

        return view('perfil.show',compact('perfil'));
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
        $perfil=Perfil::findOrFail($id);

        return view('perfil.edit',compact('perfil'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Requests\PerfilRequest $request)
	{
		$destination_path=public_path().'/img/';
        $filename='';
        $input =  $request->all();
        $input['status']= '0';
        $input['perfil']= 'enlaces';

        if($request->hasFile('picture_url')){
            $file= $request->file('picture_url');
            $filename= str_random(6).'_'.$file->getClientOriginalName();
            $upluadsucess= $file->move($destination_path,$filename);
        }
        $input['picture_url']=$filename;

        $perfil=Perfil::findOrFail($id);
        $perfil->update($request->all());

        return redirect('perfil');
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
