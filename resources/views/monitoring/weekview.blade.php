@extends('app')


@section('content')

 <h3 class="text-center">Agenda Semanal {{ $perfil->lastname  }} {{ $perfil->second_lastname }} {{ $perfil->name }}</h3>

    <h3>Mensaje Personalizado</h3>

    <h3 class="text-center">{{ \Carbon\Carbon::parse($week_schedule->initial_date)->format('M') }}</h3>
    <table class="table table-striped">
		<!--  ROW DAYS  -->
        <tr>
        	<th>Domingo {{\Carbon\Carbon::parse($week_schedule->initial_date)->format('d')}}</th>
            <th>Lunes {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDay()->format('d')}}</th>
            <th>Martes {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(2)->format('d')}}</th>
            <th>Miercoles {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(3)->format('d')}}</th>
            <th>Jueves {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(4)->format('d')}}</th>
            <th>Viernes {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(5)->format('d')}}</th>
            <th>Sabado {{\Carbon\Carbon::parse($week_schedule->initial_date)->addDays(6)->format('d')}}</th>
        </tr>
        <!--Dayly Appointments  -->
        <tr>
           <td class="text-center">
           	@foreach($perfil->sunday as $sun)
				<div class="showframe">
                       <p>Código:{{ $sun->id }}<br/>
                           {{ $sun->initial_time }} {{ $sun->end_time  }}<br/>
                           {{ $sun->state->name }}</p>
                       <a href="{{url('monitoring/showappointment')}}/{{$sun->id}}" class="btn btn-default btn-xs" role="button">
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


           <td class="text-center">
               @foreach($perfil->monday as $mon)
                   <div class="showframe">
                       <p>Código:{{ $mon->id }}<br/>
                           {{ $mon->initial_time }} {{ $mon->end_time  }}<br/>
                           {{ $mon->state->name }}</p>
                       <a href="{{url('monitoring/showappointment')}}/{{$mon->id}}" class="btn btn-default btn-xs" role="button">
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
           <td class="text-center">
               @foreach($perfil->tuesday as $tue)
                   <div class="showframe">
                       <p>Código:{{ $tue->id }}<br/>
                           {{ $tue->initial_time }} {{ $tue->end_time  }}<br/>
                           {{ $tue->state->name }}</p>
                       <a href="{{url('monitoring/showappointment')}}/{{$tue->id}}" class="btn btn-default btn-xs" role="button">
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
           <td class="text-center">
               @foreach($perfil->wednesday as $wed)
                   <div class="showframe">
                       <p>Código:{{ $wed->id }}<br/>
                           {{ $wed->initial_time }} {{ $wed->end_time  }}<br/>
                           {{ $wed->state->name }}</p>
                       <a href="{{url('monitoring/showappointment')}}/{{$wed->id}}" class="btn btn-default btn-xs" role="button">
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
           <td class="text-center">
               @foreach($perfil->thursday as $thu)
                   <div class="showframe">
                       <p>Código:{{ $thu->id }}<br/>
                           {{ $thu->initial_time }} {{ $thu->end_time  }}<br/>
                           {{ $thu->state->name }}</p>
                       <a href="{{url('monitoring/showappointment')}}/{{$thu->id}}" class="btn btn-default btn-xs" role="button">
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
           <td class="text-center">
               @foreach($perfil->friday as $fri)
                   <div class="showframe">
                       <p>Código:{{ $fri->id }}<br/>
                           {{ $fri->initial_time }} {{ $fri->end_time  }}<br/>
                           {{ $fri->state->name }}</p>
                       <a href="{{url('monitoring/showappointment')}}/{{$fri->id}}" class="btn btn-default btn-xs" role="button">
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
           <td class="text-center">
               @foreach($perfil->saturday as $sat)
                   <div class="showframe">
                       <p>Código:{{ $sat->id }}<br/>
                           {{ $sat->initial_time }} {{ $sat->end_time  }}<br/>
                           {{ $sat->state->name }}</p>
                       <a href="{{url('monitoring/showappointment')}}/{{$sat->id}}" class="btn btn-default btn-xs" role="button">
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
                <a href="{{url('monitoring/createappointment')}}/{{$week_schedule->sunday}}/{{$id}}" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="{{url('monitoring/createappointment')}}/{{$week_schedule->monday}}/{{$id}}" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="{{url('monitoring/createappointment')}}/{{$week_schedule->tuesday}}/{{$id}}" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="{{url('monitoring/createappointment')}}/{{$week_schedule->wednesday}}/{{$id}}" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="{{url('monitoring/createappointment')}}/{{$week_schedule->thursday}}/{{$id}}" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="{{url('monitoring/createappointment')}}/{{$week_schedule->friday}}/{{$id}}" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
            <td>
                <a href="{{url('monitoring/createappointment')}}/{{$week_schedule->saturday}}/{{$id}}" class="btn btn-default btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </td>
        </tr>

    </table>

    <h3>Estatus Agenda</h3>
        <a href="{{url('monitoring')}}/{{$week_schedule->initial_date}}"><button class="btn btn-default">Regresar</button></a>


@endsection