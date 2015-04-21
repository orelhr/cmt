<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
    public function About()
    {
        $data=[];
        $data['name'] = "Orel H R";

        //Function with  ( 'Nombre de la variable' , $ varname );

        return view('pages.about',$data);
    }

}
