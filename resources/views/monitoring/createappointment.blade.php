@extends('app')

@section('content')



	<h3 class="text-center">Agendar Visita {{ $day}}</h3>
	<br>
	@include('errors.list')
        {!! Form::Open(['url'=>'monitoring/store'])!!}

        <div class="form-group col-md-6">
            {!!Form::label('initial_time','Hora de Inicio:')!!}
            {!!Form::input('time','initial_time',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('end_time','Hora de Termino:')!!}
            {!!Form::input('time','end_time',null,['class' => 'form-control']) !!}
        </div>
        
          <div class="form-group col-md-12">
            {!!Form::label('comment','Nombre del Evento:')!!}
            {!!Form::text('comment',null,['class' => 'form-control', 'placeholder'=>'Nombre del Evento']) !!}
        </div>
        <div class="form-group col-md-12">
	        <h3>Carácter de la Visita</h3>   
            <div class="radio-inline col-md-3">
              <label><input type="radio" name="optradio">Primer Contacto</label>
            </div>
            <div class="radio-inline col-md-3">
              <label><input type="radio" name="optradio">De Seguimiento</label>
            </div>
            <div class="radio-inline col-md-3">
              <label><input type="radio" name="optradio">De Acuerdo</label>
            </div>
  
        </div>
        <div class="form-group col-md-12">
            <h3>Selecciona Lugar</h3>
        </div>
        <div ng-controller="mainController">
          
          <div class="form-group col-md-4">

              <label>Pais </label>
              <select class="form-control" ng-change="getStates(selectedCountry)" ng-model="selectedCountry">
                  <option ng-repeat="country in countries" value="<% country.id%>"><% country.name %></option>
              </select>
          </div>
          
          
          <div class="form-group col-md-4">
              <label>Estado</label>
              <select class="form-control" ng-change="getCities(selectedState)" ng-model="selectedState">
                  <option ng-repeat="state in states" value="<% state.id %>"><% state.name %></option>
              </select>
          </div>
          
          <div class="form-group col-md-4">
              <label>Municipios</label>
              <select class="form-control" ng-change="getLocations(selectedCity)" ng-model="selectedCity">
                  <option ng-repeat="city in cities" value="<% city.id %>"><% city.name %></option>
              </select>
          </div>
          
          <div class="form-group col-md-4">
              <label>Localidades</label>
              <select class="form-control">
                  <option ng-repeat="location in locations" value="<% location.id %>"><% location.name %></option>
              </select>
          </div>

        </div>
        <div class="form-group col-md-12">
                {!!Form::submit('Crear Cita',['class'=>'btn btn-default'])!!}
        </div>

    {!!Form::Close()!!}





@endsection