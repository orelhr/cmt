@extends('app')


@section('content');




    <h2>Perfiles</h2>

    <br/>
    <div class="row">
        @foreach($perfiles as $perfil)

                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <img src="img/{{$perfil->picture_url}}" alt="..." class="img-circle">
                        <div class="caption" align="center">
                            <h3> {{$perfil->lastname}} {{ $perfil->second_lastname }} {{$perfil->name}}</h3>
                            <p>Enlace</p>
                            <p>Zona </p>
                            <p>
                                <a href="perfil/{{ $perfil->id }}" class="btn btn-default" role="button">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                </a>
                                <a href="#" class="btn btn-default" role="button">
                                    <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
                                </a>
                                <a href="perfil/{{$perfil->id }}/edit" class="btn btn-default" role="button">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a>
                                <a href="#" class="btn btn-default" role="button">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>


        @endforeach
    </div>

    <a href="perfil/create"><button class="btn btn-primary">Agregar nuevo Perfil</button></a>

@endsection