@extends('app')


@section('content')



        <h2 class="text-center">Descripción del Equipo</h2>
        <br/>

        <table class="table table-striped">

            <tr>
                <th>Tipo de Equipo:</th>
                <td>{{ $equipment->name  }}</td>

            </tr>

            <tr>
                <th>Marca:</th>
                <td>{{ $equipment->branch }}</td>

            </tr>
            <tr>
                <th>Modelo:</th>
                <td>{{ $equipment->model }}</td>

            </tr>
            <tr>
                <th>Vigencia de Garantia:</th>
                <th>{{ $equipment->validity }}</th>
            </tr>
            <tr>
                <th>Nombre del Proveedor:</th>
                <td>{{ $equipment->provider_name }}</td>
            </tr>
            <tr>
                <th>Teléfono del Proveedor</th>
                <td>{{$equipment->provider_phone}}</td>
            </tr>
            <tr>
                <th>Fecha de compra:</th>
                <td>{{ $equipment->purchase_date }}</td>
            </tr>
            <tr>
                <th>Número de Serie:</th>
                <td>{{ $equipment->serie }}</td>
            </tr>
            <tr>
                <th>Descripción:</th>
                <td>{{$equipment->description}}</td>
            </tr>
            <tr>
                <th>Comentarios:</th>
                <td>{{ $equipment->comments }}</td>
            </tr>

        </table>
        <a href="../equipment"><button class="btn btn-default" >Regresar</button></a>


@endsection