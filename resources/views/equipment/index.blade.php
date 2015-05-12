@extends('app')

@section('content')

    <div class="container">

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
                <td><a href="equipment/{{$equipment->id}}">Ver</a> / <a href="equipment/{{$equipment->id}}/edit">Editar</a>/<a href=""> Eliminar</a></td>



            </tr>

            @endforeach

        </table>
        <a href="equipment/create"><button class="btn btn-primary">Agregar nuevo Equipo</button></a>
    </div>
@endsection

