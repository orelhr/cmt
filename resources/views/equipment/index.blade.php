@extends('app')

@section('content')



        <h2>Equipos</h2>

        <table class="table table-striped table-hover">
            <!-- set the table titles -->

            <tr>
                <th>Equipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Núm. Serie</th>
                <th>Acciones</th>


            </tr>
        @foreach($equipments as $equipment)
            <tr>
                <td>{{ $equipment->name  }}</td>
                <td>{{ $equipment->branch }}</td>
                <td>{{ $equipment->model }}</td>
                <td>{{ $equipment->serie }}</td>
                <td>
                    <a href="equipment/{{$equipment->id}}">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true">
                        </span>
                    </a> /
                    <a href="equipment/{{$equipment->id}}/edit">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true">

                        </span>
                    </a>/
                    <a href="#">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true">

                        </span>
                    </a>
                </td>



            </tr>

            @endforeach

        </table>
        <a href="equipment/create"><button class="btn btn-default">Agregar nuevo Equipo</button></a>

@endsection

