@extends('app')

@section('content')

    <div class="container">
        <h2>Editar Equipo</h2>
        <br/>
        @include('errors.list')
        {!! Form::model($equipment,['method'=>'PATCH','action'=>['EquipmentController@update',$equipment->id]])!!}
        <div class="form-group col-md-6">
            {!!Form::label('name','Tipo:')!!}
            {!!Form::text('name',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!!Form::label('branch','Marca:')!!}
            {!!Form::text('branch',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('model','Modelo:')!!}
            {!!Form::text('model',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('validity','Vigencia de la Garantia:')!!}
            {!!Form::text('validity',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!!Form::label('provider_name','Nombre del Proveedor:')!!}
            {!!Form::text('provider_name',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('provider_phone','Número del Proveedor:')!!}
            {!!Form::text('provider_phone',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('purchase_date','Fecha de la compra:')!!}
            {!!Form::input('date','purchase_date', null ,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('serie','Número de Serie')!!}
            {!!Form::text('serie',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('description','Descripción:')!!}
            {!!Form::text('description',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('comments','Observaciones:')!!}
            {!!Form::text('comments',null,['class' => 'form-control']) !!}
        </div>
        <div class="container">
            <div class="form-group">
                {!!Form::submit('Editar Equipo',['class'=>'btn btn-primary'])!!}
            </div>


        </div>

        {!!Form::Close()!!}
    </div>

@endsection