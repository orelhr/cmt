

@extends('app')


@section('content')

    <div class="jumbotron">
        <h3>Evaluación de Enlaces </h3>
        <p>Semana  del {{ \Carbon\Carbon::parse($data->initial_date)->format('d M') }} al
            {{ \Carbon\Carbon::parse($data->end_date)->format('d M Y') }}</p>

    </div>


@endsection