

@extends('app')


@section('content')



                <h3 class="text-center">Evaluación de Enlaces </h3>



            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading text-center">Semana  del {{  \Carbon\Carbon::parse($data->initial_date)->format('d M') }} al
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
                        <th colspan="5" class="text-center">Visita Semanal</th>
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
                            <a href="monitoring/week/{{$perfil->week_schedule->id}}">{{$perfil->active}}</a>

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



@endsection