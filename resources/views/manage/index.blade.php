@extends('app')
@section('content')


    <div class="row text-center">
        <h2>Asignaciones de Perfil</h2>
    </div>

    <hr/>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-md-offset-1 col-lg-offset-2 col-sm-offset-1">
            <b>Enlace: {{ $perfil->lastname  }} {{$perfil->second_lastname}} {{ $perfil->name }}</b>
        </div>
    </div>
    <div class="row well showall">

        <div class="col-md-2 col-lg-2 col-sm-6 col-md-offset-2 col-lg-offset-2 text-center setsize ">
            <h3>Equipos</h3>
            <span class="glyphicon icon-big glyphicon-briefcase marginheader "></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>

        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 text-center setsize  ">
            <h3>Transporte</h3>
            <span class="glyphicon icon-big glyphicon-plane marginheader"></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 text-center setsize ">
            <h3>Material</h3>
            <span class="glyphicon icon-big glyphicon-pencil marginheader"></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <div class="col-md-2 iconf col-lg-2 col-sm-6 text-center setsize ">
            <h3>Uniforme</h3>
            <span class="glyphicon icon-big glyphicon-user marginheader"></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 col-md-offset-2 col-lg-offset-2 text-center setsize ">
            <h3>Estados</h3>
            <span class="glyphicon icon-big glyphicon-globe marginheader"></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 text-center setsize ">
            <h3>Banco</h3>
            <span class="glyphicon icon-big glyphicon-credit-card marginheader"></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 text-center setsize ">
            <h3>Documentos</h3>
            <span class="glyphicon icon-big glyphicon-folder-close marginheader"></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>
        </div>
        <div class="col-md-2 col-lg-2 col-sm-6 text-center setsize ">
            <h3>Todo</h3>
            <span class="glyphicon icon-big glyphicon-search marginheader"></span>
            <p>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </p>
        </div>


    </div>
    <div class="row">
        <div class="col-md-offset-2">

            <a href="../../perfil"><button class="btn btn-primary">Regresar</button></a>
        </div>
    </div>



@endsection