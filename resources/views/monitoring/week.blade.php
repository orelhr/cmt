@extends('app')


@section('content')

    <h2 class="text-center">Agenda Semanal</h2>

    <h3 class="text-center">Enlace: {{ $perfil->lastname  }} {{ $perfil->second_lastname }} {{ $perfil->name }}</h3>

    <h3>Mensaje Personalizado</h3>

    <h3 class="text-center">{{ \Carbon\Carbon::parse($week_schedule->initial_date)->format('M') }}</h3>
    <table class="table table-striped">

        <tr>
            <th>Lunes {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDay()->format('d')}}</th>
            <th>Martes {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(2)->format('d')}}</th>
            <th>Miercoles {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(3)->format('d')}}</th>
            <th>Jueves {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(4)->format('d')}}</th>
            <th>Viernes {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(5)->format('d')}}</th>
            <th>Sabado {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(6)->format('d')}}</th>
        </tr>
        <tr>
           <td class="text-center">
               @foreach($perfil->monday as $mon)
                   <div class="showframe">
                       <p>Código:{{ $mon->id }}<br/>
                           {{ $mon->initial_time }} {{ $mon->end_time  }}<br/>
                           {{ $mon->state->name }}</p>
                       <a href="#" class="btn btn-default btn-xs" role="button">
                           <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                       </a>
                       <a href="#" class="btn btn-default btn-xs" role="button">
                           <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                       </a>
                       <a href="#" class="btn btn-default btn-xs" role="button">
                           <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                       </a>
                       <a href="#" class="btn btn-default btn-xs" role="button">
                           <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                       </a>

                   </div>


               @endforeach

           </td>

        </tr>
        <tr>
            <td>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="#" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
        </tr>

    </table>

    <h3>Estatus Agenda</h3>
        <a href="#"><button class="btn btn-primary">Regresar</button></a>


@endsection