@extends('app')


@section('content')

    <div class="container">

        <h2>Descripción Automóvil</h2>
        <br/>

        <table class="table table-striped">


            <tr>
                <th>Marca:</th>
                <td>{{ $auto->branch }}</td>

            </tr>
            <tr>
                <th>Modelo:</th>
                <td>{{ $auto->model }}</td>

            </tr>
            <tr>
                <th>Serie:</th>
                <th>{{ $auto->serie }}</th>
            </tr>
            <tr>
                <th>Placas:</th>
                <td>{{ $auto->plates}}</td>
            </tr>
            <tr>
                <th>No motor</th>
                <td>{{$auto->engine_number }}</td>
            </tr>
            <tr>
                <th>Tipo:</th>
                <td>{{ $auto->type }}</td>
            </tr>
            <tr>
                <th>Accesorios:</th>
                <td>{{ $auto->accessories }}</td>
            </tr>
            <tr>
                <th>Observaciones:</th>
                <td>{{ $auto->details }}</td>
            </tr>


        </table>
        <a href="../auto"><button class="btn btn-primary" >Regresar</button></a>



    </div>

@endsection