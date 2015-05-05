@extends('app')


@section('content');


<div class="container">

    <h1>Perfiles</h1>

    <table class="table table-striped table-hover">
        <!-- set the table titles -->

        <tr>
            <th>Fotografía</th>
            <th>Nombre</th>
            <th>No. de Enlace</th>
            <th>Zona</th>


        </tr>
        @foreach($perfiles as $perfil)
            <tr>
                <td>{{ $perfil->picture_url }}</td>
                <td>{{ $perfil->lastname   }} {{ $perfil->second_lastname }} {{$perfil->name }}</td>
                <td>{{ $perfil->perfil }}</td>
                <td>Zona no.</td>

                <td><a href="equipment/{{$perfil->id}}">Ver</a> / <a href="equipment/{{$perfil->id}}/edit">Editar</a>/<a href=""> Eliminar</a></td>



            </tr>

        @endforeach

    </table>
    <a href="equipment/create"><button class="btn btn-primary">Agregar nuevo Equipo</button></a>
@endsection;