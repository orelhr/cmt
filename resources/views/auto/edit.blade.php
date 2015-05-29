@extends('app')


@section('content')

        <h2>Editar Automóvil</h2>
        <br/>
        @include('errors.list')
        {!! Form::model($auto,['method'=>'PATCH','action'=>['AutoController@update',$auto->id]])!!}
        <div class="form-group col-md-6">
            {!!Form::label('branch','Marca:')!!}
            {!!Form::text('branch',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!!Form::label('model','Modelo:')!!}
            {!!Form::text('model',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('serie','No. serie:')!!}
            {!!Form::text('serie',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('plates','No. de Placas:')!!}
            {!!Form::text('plates',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-md-6">
            {!!Form::label('engine_number','No. Motor:')!!}
            {!!Form::text('engine_number',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('accessories','Accesorios:')!!}
            {!!Form::text('accessories',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('type','Tipo:')!!}
            {!!Form::text('type',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('details','Observaciones:')!!}
            {!!Form::text('details',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('active_date','Fecha Activo:')!!}
            {!!Form::input('date','active_date',null,['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!!Form::label('inactive_date','Fecha de Inactivo:')!!}
            {!!Form::input('date','inactive_date',null,['class' => 'form-control']) !!}
        </div>



        <div class="container">
            <div class="form-group">
                {!!Form::submit('Editar Automóvil',['class'=>'btn btn-primary'])!!}
            </div>


        </div>

        {!!Form::Close()!!}



@endsection