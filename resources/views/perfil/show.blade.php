@extends('app')


@section('content')


        <row >
            <div class="col-md-12">
                <h2 class="text-center"> Datos del  Enlace</h2>
                <br/>
            </div>
        </row>

        <row >
            <div class="col-md-12">
                <div class="thumbnail">
                    <img src="../img/{{$perfil->picture_url}}" alt="" class="img-rounded"/>
                </div>

            </div>
            <div class="col-md-9">
                <row>
                    <div class="col-md-5">
                        <h3> Nombre del Enlace: </h3>
                    </div>
                    <div class="col-md-4 text-left">

                        {{ $perfil->name }} {{ $perfil->lastname }} {{$perfil->second_lastname}}

                    </div>

                </row>
                <row>
                    <div class="col-md-5">
                        <h3>Estados Asignados:</h3>
                    </div>
                    <div class="col-md-4" text-left>
                        @foreach($states as $state)
                            {{ $state->name }}
                        @endforeach
                    </div>
                </row>


            </div>


        </row>







@endsection
