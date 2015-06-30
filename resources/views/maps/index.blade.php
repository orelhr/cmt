@extends('app')

@section('content')


    <h3 class="text-center">Selecciona la fecha</h3>
    <div class="row">
         <div class="form-group col-md-3 col-xl-3">
            <input class="form-control" type="date" value="{{ \Carbon\Carbon::today()->format("Y-m-d") }}" id="datepickup">
        </div>     
    </div>
    

    <section id="map" ng-controller="MapsController" >
        <div ui-map="myMap" ui-options="mapOptions" class="col-md-offset-3 col-md-6 map-canvas"></div>
    </section>
    
    
    
    @endsection