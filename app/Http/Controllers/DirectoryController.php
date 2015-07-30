<?php namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Dependency;
use App\Daily_schedule;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Location;
use App\State;
use Illuminate\Http\Request;

class DirectoryController extends Controller {

	//
    public function countries(){

        $countries= Country::all();

        return $countries;

    }
    public function states($id){

        $states= State::where('id_country',$id)->select('id','name')->get();
        return $states;

    }
    public function cities($id){
       $cities= City::where('id_state',$id)->select('id','name')->get();
        return $cities;

    }
    public function locations($id){

        $locations= Location::where('id_city',$id)->select('id','name')->get();

        return $locations;
    }
    public function dependency($id){

        $dependency = Dependency::where('id_location',$id)->get();
        return $dependency;
    }
    public function characterByDailyId($id){

        $daily= Daily_schedule::Where('id',$id)->select('character')->first();
       // dd($daily);
        return $daily;
    }
    public function locationByDailyId($id){

        $daily= Daily_schedule::Where('id',$id)->select('id_location')->first();

        $location= Location::findOrFail($daily->id_location);


        $model['location']= $location;

        $city= City::Where('id', $location->id_city  )->first();
        $locations=Location::Where('id_city',$city->id)->get();
        $model['city']=$city;
        $model['locations']=$locations;
        $state=State::Where('id',$city->id_state)->first();
        $cities=City::Where('id_state',$state->id)->get();

        $model['cities']=$cities;
       
        $model['state']= $state;
        
        $country= Country::Where('id',$state->id_country)->first();
        $states=State::Where('id_country',$country->id)->get();
        $model['states']=$states;
        $countries= Country::all();
        $model['country']=$country;
        $model['countries']=$countries;

        return $model;
    }
}
