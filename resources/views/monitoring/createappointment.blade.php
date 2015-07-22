@extends('app')

@section('content')


<div ng-controller="mainController">
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
              <label><input type="radio" ng-model="character" name="character" value="first" ng-change="getOption()">Primer Contacto</label>
            </div>
            <div class="radio-inline col-md-3">
              <label><input type="radio" ng-model="character" name="character" value="second" ng-change="getOption()">De Seguimiento</label>
            </div>
            <div class="radio-inline col-md-3">
              <label><input type="radio" ng-model="character" name="character" value="third" ng-change="getOption()">De Acuerdo</label>
            </div>
  
        </div>
        <div class="form-group col-md-12" ng-if="select">
            <h3>Selecciona Lugar</h3>
        </div>
          
          <div class="form-group col-md-4" ng-if="select">

              <label ng-if="select">Pais </label>
              <select class="form-control" ng-change="getStates(selectedCountry)" ng-model="selectedCountry">
                  <option ng-repeat="country in countries" value="<% country.id%>"><% country.name %></option>
              </select>
          </div>
          
          
          <div class="form-group col-md-4" ng-if="select">
              <label>Estado</label>
              <select class="form-control" ng-change="getCities(selectedState)" ng-model="selectedState">
                  <option ng-repeat="state in states" value="<% state.id %>"><% state.name %></option>
              </select>
          </div>
          
          <div class="form-group col-md-4" ng-if="select">
              <label>Municipios</label>
              <select class="form-control" ng-change="getLocations(selectedCity)" ng-model="selectedCity">
                  <option ng-repeat="city in cities" value="<% city.id %>"><% city.name %></option>
              </select>
          </div>
          
          <div class="form-group col-md-4" ng-if="select">
              <label>Localidades</label>
              <select class="form-control">
                  <option ng-repeat="location in locations" value="<% location.id %>"><% location.name %></option>
              </select>
          </div>

          <!--- First Meeting  html-->
         
          <div class="form-group col-md-6" ng-if="firstMeeting">
            <label>Tipo de visita</label>
            <select class="form-control">
              <option value="townGroup">Grupo Comunitario</option>
              <option value="governmentDependency">Dependencia Gubernamental </option>
            </select>
          </div>
          <div class="form-group col-md-12" ng-if="firstMeeting">
            {!!Form::label('name','Nombre del Grupo o Dependencia:')!!}
            {!!Form::text('name',null,['class' => 'form-control', 'placeholder'=>'Nombre del Grupo o Dependencia']) !!}
          </div>
          <div class="form-group col-md-12" ng-if="firstMeeting">
            {!!Form::label('address','Dirección:')!!}
            {!!Form::text('address',null,['class' => 'form-control', 'placeholder'=>'Dirección']) !!}
          </div>
          <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('phone','Teléfono Institucional:')!!}
            {!!Form::text('phone',null,['class' => 'form-control', 'placeholder'=>'Teléfono Institucional']) !!}
          </div>
           <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('ext','Número Extensión:')!!}
            {!!Form::text('ext',null,['class' => 'form-control', 'placeholder'=>'Número Extensión']) !!}
          </div>
          <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('celphone','Teléfono Celular:')!!}
            {!!Form::text('celphone',null,['class' => 'form-control', 'placeholder'=>'Teléfono Celular']) !!}
          </div>
          <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('nameguest','Nombre:')!!}
            {!!Form::text('nameguest',null,['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
          </div>
           <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('lastname','Apellido:')!!}
            {!!Form::text('lastname',null,['class' => 'form-control', 'placeholder'=>'Primer Apellido']) !!}
          </div>
           <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('secondlastname','Segundo Apellido:')!!}
            {!!Form::text('secondlastname',null,['class' => 'form-control', 'placeholder'=>'Segundo Apellido']) !!}
          </div>
          <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('email','Correo Institucional:')!!}
            {!!Form::input('email','email',null,['class' => 'form-control']) !!}
          </div>
          <div class="form-group col-md-8" ng-if="firstMeeting">
            {!!Form::label('occupation','Ocupación:')!!}
            {!!Form::text('occupation',null,['class' => 'form-control', 'placeholder'=>'Ocupación']) !!}
          </div>
          <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('personalphone','Teléfono Personal:')!!}
            {!!Form::text('personalphone',null,['class' => 'form-control', 'placeholder'=>'Teléfono Personal']) !!}
          </div>
          <div class="form-group col-md-4" ng-if="firstMeeting">
            {!!Form::label('personalemail','Correo Personal:')!!}
            {!!Form::input('email','personalemail',null,['class' => 'form-control']) !!}
          </div>


          <!-- Following Meeting html-->

          <!-- Agreement Meeting html-->

        
        <div class="form-group col-md-12">
                {!!Form::submit('Crear Cita',['class'=>'btn btn-default'])!!}
        </div>

    {!!Form::Close()!!}

</div>
	




@endsection