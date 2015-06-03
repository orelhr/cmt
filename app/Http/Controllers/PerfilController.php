<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Perfil;
use App\Http\Controllers\Controller;

use App\State;
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
        flash()->success("El perfil ha sido creado");
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

        $states= State::join('state_perfil','state.id','=','state_perfil.id_state')
            ->join('perfil','state_perfil.id_perfil','=','perfil.id')
            ->where('state_perfil.active','1')
            ->where('perfil.id',$id)->select('state.name')->get();

        //dd($states);

        return view('perfil.show',compact('perfil','states'));
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
	public function update($id,  Requests\PerfilUpdateRequest $request)
	{
		$destination_path=public_path().'/img/';
        $filename='';
        $input =  $request->all();


        if($request->hasFile('picture_url')){
            $file= $request->file('picture_url');
            $filename= str_random(6).'_'.$file->getClientOriginalName();
            $upluadsucess= $file->move($destination_path,$filename);
           // dd($filename);
            $input['picture_url']=$filename;
            //dd($input['picture_url']);
        }


        $perfil=Perfil::findOrFail($id);
        $perfil->update($input);
        flash()->success("El perfil ha sido actualizado");
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
