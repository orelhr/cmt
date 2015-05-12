@extends('app')



@section('content')

    <div class="container">

        <h2>Automóviles</h2>

        <table class="table table-striped table-hover">
            <!-- set the table titles -->

            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Serie</th>
                <th>Placas</th>
                <th>No. Motor</th>
                <th>Accesorios</th>
                <th>Tipo</th>
                <th>Acciones</th>


            </tr>
            @foreach($autos as $auto)
                <tr>

                    <td>{{ $auto->branch }}</td>
                    <td>{{ $auto->model }}</td>
                    <td>{{ $auto->serie }}</td>
                    <td>{{ $auto->plates }}</td>
                    <td>{{ $auto->engine_number }}</td>
                    <td>{{ $auto->accessories }}</td>
                    <td>{{ $auto->type }}</td>

                    <td><a href="auto/{{$auto->id}}">Ver</a> / <a href="auto/{{$auto->id}}/edit">Editar</a>/<a href=""> Eliminar</a></td>



                </tr>

            @endforeach

        </table>
        <a href="auto/create"><button class="btn btn-primary">Agregar nuevo Automóvil</button></a>
    </div>


@endsection