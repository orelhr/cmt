

@extends('app')


@section('content')



                <h3 class="text-center">Evaluación de Enlaces </h3>



            <div class="panel panel-wrapper">
                <!-- Default panel contents -->
                <div class="panel-heading text-center">Semana  del {{  \Carbon\Carbon::parse($data->initial_date)->addDay()->format('d M') }} al
                    {{  \Carbon\Carbon::parse($data->end_date)->format('d M Y') }}
                </div>

                <!-- Table -->


                <table class="table table-striped" ng-controller="ReportController">
                    <tr>
                        <th rowspan="2">Zona</th>
                        <th rowspan="2">Nombre del Enlace</th>
                        <th rowspan="2">P.A</th>
                        <th rowspan="2">Estado</th>
                        <th rowspan="2">Estatus Agenda</th>
                        <th colspan="6" class="text-center">Visita Semanal</th>
                    </tr>
                    <tr>
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
                                <a href="monitoring/week/{{$perfil->week_schedule->id}}">
                                    {{$perfil->active}}
                                    <span class="glyphicon glyphicon-calendar" aria-hidden="true">

                                    </span>
                                </a>
                            </b>

                        </td>
                        <td class="putcolor"> {{ $perfil->monday }}/6
                            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
                        </td>
                        <td class="putcolor"> {{$perfil->tuesday}}/6
                            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
                        </td>

                        <td class="putcolor"> {{$perfil->wednesday }}/6
                            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
                        </td>
                        <td class="putcolor"> {{ $perfil->thursday }}/6
                            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
                        </td>
                        <td class="putcolor"> {{ $perfil->friday }}/6
                            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
                        </td>
                        <td class="putcolor"> {{ $perfil->saturday }}/3
                            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
                        </td>

                        @endforeach


                    </tr>
                </table>

            </div>

    <div class="row">
        <div class="col-md-2">
            <a href="/laravel/cmt/public/monitoring/{{\Carbon\Carbon::createFromFormat("Y-m-d",$day)->addWeeks(-1)->format('Y-m-d')}}"><button class="btn btn-default">Semana Anterior</button></a>
        </div>
        <div class="col-md-offset-8 col-md-2">
            <a href="/laravel/cmt/public/monitoring/{{\Carbon\Carbon::createFromFormat("Y-m-d",$day)->addWeeks(1)->format('Y-m-d')}}"><button class="btn btn-default">Semana Siguiente</button></a>

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