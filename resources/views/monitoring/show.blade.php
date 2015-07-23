

@extends('app')


@section('content')

<!-- Default panel contents -->
<h3 class="text-center">
    Semana  del {{  \Carbon\Carbon::parse($data->initial_date)->format('d M') }} al
    {{  \Carbon\Carbon::parse($data->end_date)->format('d M Y') }}

</h3>

<!-- Table -->


<table class="table table-striped" ng-controller="ReportController">
    <tr>
        <td rowspan="2" class="text-center">Zona</td>
        <td rowspan="2" class="text-center">Nombre del Enlace</td>
        <td rowspan="2" class="text-center">P.A</td>
        <td rowspan="2" class="text-center">Estado</td>
        <td rowspan="2" class="text-center">Estado</td>
        <td colspan="7" class="text-center">Visita Semanal</td>
    </tr>
    <tr>
        <td>Domingo</td>
        <td>Lunes</td>
        <td>Martes</td>
        <td>Miercoles</td>
        <td>Jueves</td>
        <td>Viernes</td>
        <td>Sabado</td>                    

    </tr>
    @foreach($perfiles as $perfil )
    <tr>
        <td>@foreach($perfil->states as $state)
                {{ $state->description }} <br>
            @endforeach</td>
        <td>{{ $perfil->lastname }} {{  $perfil->second_lastname }} {{ $perfil->name }} </td>
        <td>P.A</td>
        <td>@foreach($perfil->states as $state)
                   {{ $state->name }} <br>
            @endforeach
        </td>
        <td>
            <b>
                <a href="{{url('monitoring/week')}}/{{$perfil->week_schedule->id}}">
                    {{$perfil->active}}
                    <span class="glyphicon glyphicon-calendar" aria-hidden="true">

                    </span>
                </a>
            </b>

        </td>
        <td class="putcolor"> {{$perfil->sunday}}
            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
        </td>
        <td class="putcolor"> {{ $perfil->monday }}
            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
        </td>
        <td class="putcolor"> {{$perfil->tuesday}}
            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
        </td>

        <td class="putcolor"> {{$perfil->wednesday }}
            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
        </td>
        <td class="putcolor"> {{ $perfil->thursday }}
            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
        </td>
        <td class="putcolor"> {{ $perfil->friday }}
            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
        </td>
        <td class="putcolor"> {{ $perfil->saturday }}
            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
        </td>

        @endforeach


    </tr>
</table>

<div class="row">
    <div class="col-md-2">
        <a href="{{url('monitoring')}}/{{\Carbon\Carbon::createFromFormat("Y-m-d",$day)->addWeeks(-1)->format('Y-m-d')}}"><button class="btn btn-default">Semana Anterior</button></a>
    </div>
    <div class="col-md-offset-8 col-md-2">
        <a href="{{url('monitoring')}}/{{\Carbon\Carbon::createFromFormat("Y-m-d",$day)->addWeeks(1)->format('Y-m-d')}}"><button class="btn btn-default">Semana Siguiente</button></a>

    </div>
</div>
<br/>
<!-- //     Select Personalized Day
<h3 class="text-left">Selecciona Fecha para visualizar los reportes</h3>
<div class="row">
    <div class="form-group col-md-3 col-xl-3">
        <input class="form-control" type="date" value="{{ \Carbon\Carbon::today()->format("Y-m-d") }}" id="datepickup">
        <button class="btn btn-default">Ir</button>
    </div>

    
</div>

-->



@endsection