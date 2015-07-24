@extends('app')

@section('content')


<div class="jumbotron container">
	<div class="panel panel-default">
	  <div class="panel-heading">Información de la Cita</div>
	  <div class="panel-body">
	  	<div class=" col-md-6">
		<b>Hora de Inicio:</b> {{$daily->initial_time}}
		</div>
		
		<div class=" col-md-6">
			<b>Hora de Finalización:</b> {{$daily->end_time}}
		</div>
		<div class="col-md-12"><b>Nombre del Evento: </b>{{$daily->event_name}}</div>
		

		<div class="col-md-12"><b>Lugar: </b>{{ $state->name }} {{ $city->name }} {{ $location->name }}</div>
		
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">Información del Grupo</div>
	 	 <div class="panel-body">
	   	  	<div class="col-md-6">
				<b>Carácter de visita: </b> {{$daily->character }}
			</div>
			<div class="col-md-6">
				<b>Tipo de Visita:</b>
				@if($guest_type->type==1)
				Grupo Comunitario
				@else
				Gobierno
				@endif
			</div>
			<div class="col-md-12">
				<b>Nombre del Grupo o Dependencia: </b>{{$group->name}}
			</div>
	  	</div>
	</div>
	
	<div class="panel panel-default">
	  <div class="panel-heading">Información de Contacto</div>
		  <div class="panel-body">
		  
			<div class="col-md-12">
				<b>Visita a: </b>{{$guest->name}} 
			</div>
			<div class="col-md-6">
				<b>Teléfono Personal:</b> {{$guest->phone }}
			</div>
			<div class="col-md-6">
				<b>Correo:</b>{{$guest->email}}
			</div>
		  </div>
	</div>
	<div class="well well-lg container-fluid">
		<h3>Resultados Obtenidos:</h3>
		
		@if($daily->completed==0)
		Estado: No concluida
		@else
		Estado: Concluida
		@endif

		<h3>Programas de Interés:</h3>
		
		<h3>Acciones a tomar:</h3>
		
		<h3>Comentarios adicionales:</h3>
		{{$daily->comments}}
		

	</div>
	
	


	


</div>

@endsection