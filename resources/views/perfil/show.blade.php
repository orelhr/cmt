@extends('app')


@section('content')


        <div class="row" >
            <div class="col-md-12 col-xs-12">
                <h2 class="text-center"> Datos del  Enlace</h2>
                <br/>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12">
                <div class="thumbnail">
                    <img src="../img/{{$perfil->picture_url}}" alt="" class="img-rounded"/>
                </div>
            </div>
            <div class="row col-sm-9 col-md-9 col-lg-9 ">
                <div class="row">

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 text-right">
                        <h3>Nombre del Enlace:</h3>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 text-left">
                       <h3>{{ $perfil->name }} {{ $perfil->lastname }} {{$perfil->second_lastname}}</h3>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 text-right">
                        <h3>Estados Asignados:</h3>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6  col-xs-6 text-left">
                      <h3>
                          @foreach($states as $state)
                          {{ $state->name }}
                          @endforeach
                      </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 text-right">
                        <h3>
                            Dirección:
                        </h3>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 text-left">
                        <h3>
                            {{ $perfil->address }}
                        </h3>
                    </div>
                </div>

            </div>

        </div>
        <div class="row">

            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Fecha de Nacimiento:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2  col-xs-6  text-left">
                <h3>
                    {{ $perfil->birthdate  }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Sexo:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2  col-xs-6  text-left">
                <h3>
                    {{ $perfil->sexo  }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Tipo de Sangre:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2  col-xs-6  text-left">
                <h3>
                    {{ $perfil->blood_type  }}
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Estado Civil:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2  col-xs-6  text-left">
                <h3>
                    {{ $perfil->civil_status  }}
                </h3>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 text-center">
                <h2>Datos de Contacto</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Teléfono Personal:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->phone }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Teléfono Laboral:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->cmt_email }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Correo Personal:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->email }}
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Correo laboral:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->cmt_email }}
                </h3>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 text-center">
                <h2>Datos de Profesión</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Profesión:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->occupation }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Lincencia  No:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->license }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>RFC:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->rfc }}
                </h3>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>CURP:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->curp }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>IFE:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->ife }}
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Licencia de Conducir:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->driver_license }}
                </h3>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-right">
                <h3>
                    <b>Vigencia de la Licencia:</b>
                </h3>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-6 text-left">
                <h3>
                    {{ $perfil->expiration_date }}
                </h3>
            </div>
        </div>
        <hr/>
        <div class="row ">
            <a href="../perfil"><button class="btn btn-default col-md-offset-1 col-lg-offset-1 " >Regresar</button></a>
        </div>




@endsection
