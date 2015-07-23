@extends('app')

@section('content')


<div ng-controller="mainController">
  <h3 class="text-center">Agendar Visita {{ $day}}</h3>
  <br>
  @include('errors.list')
        {!! Form::Open(['url'=>'monitoring/store/'.$day.'/'.$id])!!}

        <div class="form-group col-md-6">
            {!!Form::label('initial_time','Hora de Inicio:')!!}
            {!!Form::input('time','initial_time',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('end_time','Hora de Termino:')!!}
            {!!Form::input('time','end_time',null,['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group col-md-12">
            {!!Form::label('event_name','Nombre del Evento:')!!}
            {!!Form::text('event_name',null,['class' => 'form-control', 'placeholder'=>'Nombre del Evento']) !!}
        </div>
        <div class="form-group col-md-12">
          <h3>Carácter de la Visita</h3>   
            <div class="radio-inline col-md-3">
              <label><input type="radio" ng-model="character" name="character" value="first" ng-change="getOption()">Primer Contacto</label>
            </div>
            <div class="radio-inline col-md-3">
              <label><input type="radio" ng-model="character" name="character" value="following" ng-change="getOption()">De Seguimiento</label>
            </div>
            <div class="radio-inline col-md-3">
              <label><input type="radio" ng-model="character" name="character" value="agreement" ng-change="getOption()">De Acuerdo</label>
            </div>
  
        </div>

        <!-- Select location section -->

        <div  ng-if="select">
          
          <div class="form-group col-md-12">
            <h3>Selecciona Lugar</h3>
          </div>
          
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
              <select name="location" class="form-control">
                  <option ng-repeat="location in locations" value="<% location.id %>"><% location.name %></option>
              </select>
          </div>

        </div>
        

          <!--- First Meeting  html-->

         <div ng-if="firstMeeting">
            
            <div class="form-group col-md-6">
              <label>Tipo de visita</label>
                <select name="guestType" class="form-control">
                  <option value="townGroup">Grupo Comunitario</option>
                  <option value="governmentDependency">Dependencia Gubernamental </option>
                </select>
            </div>
            
            <!-- Group Form -->
            <div class="form-group col-md-12">
              <h3>Información del Grupo</h3>
            </div>
            

            <div class="form-group col-md-12">
              {!!Form::label('name','Nombre del Grupo o Dependencia:')!!}
              {!!Form::text('name',null,['class' => 'form-control', 'placeholder'=>'Nombre del Grupo o Dependencia']) !!}
            </div>
            <div class="form-group col-md-12">
              {!!Form::label('address','Dirección:')!!}
              {!!Form::text('address',null,['class' => 'form-control', 'placeholder'=>'Dirección']) !!}
            </div>
            <div class="form-group col-md-4">
              {!!Form::label('email','Correo Institucional:')!!}
              {!!Form::input('email','email',null,['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-4">
              {!!Form::label('phone','Teléfono Institucional:')!!}
              {!!Form::text('phone',null,['class' => 'form-control', 'placeholder'=>'Teléfono Institucional']) !!}
            </div>
             <div class="form-group col-md-4">
              {!!Form::label('ext','Número Extensión:')!!}
              {!!Form::text('ext',null,['class' => 'form-control', 'placeholder'=>'Número Extensión']) !!}
            </div>
            <div class="form-group col-md-4">
              {!!Form::label('phone2','Teléfono Adicional:')!!}
              {!!Form::text('phone2',null,['class' => 'form-control', 'placeholder'=>'Teléfono Celular']) !!}
            </div>
            <div class="form-group col-md-4">
              {!!Form::label('ext2','Extensión:')!!}
              {!!Form::text('ext2',null,['class' => 'form-control', 'placeholder'=>'Número de Extensión']) !!}
            </div>

            <!-- Guest Form -->
            
            <div class="form-group col-md-12">
              <h3>Información de Contacto</h3>
            </div>
            

            <div class="form-group col-md-4">
              {!!Form::label('nameguest','Nombre:')!!}
              {!!Form::text('nameguest',null,['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
            </div>
             <div class="form-group col-md-4">
              {!!Form::label('lastname','Apellido:')!!}
              {!!Form::text('lastname',null,['class' => 'form-control', 'placeholder'=>'Primer Apellido']) !!}
            </div>
             <div class="form-group col-md-4">
              {!!Form::label('secondlastname','Segundo Apellido:')!!}
              {!!Form::text('secondlastname',null,['class' => 'form-control', 'placeholder'=>'Segundo Apellido']) !!}
            </div>
            <div class="form-group col-md-8">
              {!!Form::label('charge','Puesto que Desempeña:')!!}
              {!!Form::text('charge',null,['class' => 'form-control', 'placeholder'=>'Puesto que Desempeña']) !!}
            </div>
            <div class="form-group col-md-12">
              {!!Form::label('personaladdress','Dirección del Contacto:')!!}
              {!!Form::text('personaladdress',null,['class' => 'form-control', 'placeholder'=>'Dirección del Contacto:']) !!}
            </div>
            <div class="form-group col-md-4">
              {!!Form::label('personalphone','Teléfono Personal:')!!}
              {!!Form::text('personalphone',null,['class' => 'form-control', 'placeholder'=>'Teléfono Personal']) !!}
            </div>
            <div class="form-group col-md-4">
              {!!Form::label('personalemail','Correo Personal:')!!}
              {!!Form::input('email','personalemail',null,['class' => 'form-control']) !!}
            </div>


         </div>
          

          <!-- Following Meeting html-->
         <div>
           
         </div>
          <!-- Agreement Meeting html-->

         <div>
           
         </div>
         <div class="form-group col-md-12">
            {!!Form::submit('Crear Cita',['class'=>'btn btn-default'])!!}
         </div>

    {!!Form::Close()!!}

</div>
	




@endsection