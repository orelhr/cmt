

@extends('app')


@section('content')


            <div class="starter-template">
                <h3>Evaluación de Enlaces </h3>
                <p>Semana  del {{ \Carbon\Carbon::parse($data->initial_date)->format('d M') }} al
                    {{ \Carbon\Carbon::parse($data->end_date)->format('d M Y') }}</p>

            </div>

            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Vista Semanal</div>

                <!-- Table -->
                <table class="table table-striped" ng-controller="ReportController">
                    <tr>
                        <th rowspan="2">Zona</th>
                        <th rowspan="2">Nombre del Enlace</th>
                        <th rowspan="2">P.A</th>
                        <th rowspan="2">Estado</th>
                        <th rowspan="2">Estatus Agenda</th>
                        <th colspan="5">Visita Semanal</th>
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
                        <td>{{  $perfil->description }}</td>
                        <td>{{ $perfil->lastname }} {{  $perfil->second_lastname }} {{ $perfil->name }} </td>
                        <td>P.A</td>
                        <td></td>
                        <td>Estatus Agenda</td>
                        <td class="putcolor"> X/6
                            <span class="glyphicon glyphicon-ok" ng-show="test" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-remove" ng-hide="test" aria-hidden="true"></span>
                        </td>
                        <td> X/6 </td>
                        <td> X/6 </td>
                        <td> X/6 </td>
                        <td> X/6 </td>
                        <td> X/3 </td>

                        @endforeach


                    </tr>
                </table>
            </div>



@endsection