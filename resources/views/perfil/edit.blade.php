@extends('app')


@section('content')


        <h2>Nuevo Enlace</h2>
        <br/>
        @include('errors.list')
        {!! Form::model($perfil,['method'=>'PATCH','action'=>['PerfilController@update',$perfil->id],'files'=>true])!!}
        <div class="form-group col-md-12">
            <h3>Nombre del enlace:</h3>
        </div>

        <div class="form-group col-md-4">
            {!!Form::label('name','Nombre:')!!}
            {!!Form::text('name',null,['class' => 'form-control', 'placeholder'=>'Nombre']) !!}
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('lastname','Apellido Paterno:')!!}
            {!!Form::text('lastname',null,['class' => 'form-control', 'placeholder'=>'Apellido Paterno']) !!}
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('second_lastname','Apellido Materno:')!!}
            {!!Form::text('second_lastname',null,['class' => 'form-control', 'placeholder'=>'Apellido Materno']) !!}
        </div>
        <div class="form-group col-md-12">
            <h3>Imagen:</h3>
        </div>

        <div class="form-group col-md-12">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="thumbnail">
                    <img src="../../img/{{$perfil->picture_url}}" alt="..." class="img-rounded">
                </div>
            </div>
            <label for="picture_url">Cargar Imagen:</label>
            <input name="picture_url" type="file" id="picture_url">
            <p class="help-block">Tamaño Máximo 10 Mb.</p>
        </div>

        <div class="form-group col-md-12">
            <h3>Datos del enlace:</h3>
        </div>

        <div class="form-group col-md-4">
            {!!Form::label('phone','Teléfono:')!!}
            {!!Form::text('phone',null,['class' => 'form-control ','placeholder'=>'Teléfono'] ) !!}
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('email','Correo:')!!}
            {!!Form::email('email',null,['class' => 'form-control', 'placeholder'=>'Correo']) !!}
        </div>

        <div class="form-group col-md-4">
            {!!Form::label('cmt_email','Correo CMT:')!!}
            {!!Form::email('cmt_email',null,['class' => 'form-control', 'placeholder'=>'Correo CMT']) !!}
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('ife','IFE:')!!}
            {!!Form::text('ife',null,['class' => 'form-control', 'placeholder'=>'IFE']) !!}
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('curp','CURP:')!!}
            {!!Form::text('curp',null,['class' => 'form-control', 'placeholder'=>'CURP']) !!}
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('rfc','RFC:')!!}
            {!!Form::text('rfc',null,['class' => 'form-control', 'placeholder'=>'RFC']) !!}
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('birthdate','Fecha de Nacimiento:')!!}
            {!!Form::input('date','birthdate',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-4">
            <label for="sexo">Sexo: </label>
            <select class="form-control" name="sexo" id="sexo">
                <option>Masculino</option>
                <option>Femenino</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="civil_status">Estado civil: </label>
            <select class="form-control" name="civil_status" id="civil_status">
                <option>Soltero</option>
                <option>Casado</option>
                <option>Divorciado</option>
                <option>Viudo</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="blood_type">Tipo de Sangre: </label>
            <select class="form-control" name="blood_type" id="blood_type">
                <option>O+</option>
                <option>O-</option>
                <option>A+</option>
                <option>A-</option>
                <option>AB+</option>
                <option>AB-</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            {!!Form::label('emergency_phone','Teléfono de Emergencia:')!!}
            {!!Form::text('emergency_phone',null,['class' => 'form-control', 'placeholder'=>'Teléfono de Emergencia']) !!}
        </div>
        <div class="form-group col-md-12">
            <h3>Datos profesionales</h3>
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('occupation','Profesión:')!!}
            {!!Form::text('occupation',null,['class' => 'form-control', 'placeholder'=>'Profesión:']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('license','Cedula Profesional:')!!}
            {!!Form::text('license',null,['class' => 'form-control', 'placeholder'=>'Cedula']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('driver_license','Licencia de Conducir:')!!}
            {!!Form::text('driver_license',null,['class' => 'form-control', 'placeholder'=>'No. de Licencia']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('expiration_date','Fecha de Expiracion:')!!}
            {!!Form::input('date','expiration_date',null,['class' => 'form-control']) !!}
        </div>


        <div class="container">
            <div class="form-group col-md-12">
                {!!Form::submit('Editar Enlace',['class'=>'btn btn-primary'])!!}
            </div>


        </div>

        {!!Form::Close()!!}



@endsection