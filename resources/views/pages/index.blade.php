@extends('app')


@section('content')

    <div class="container">

        <div class="jumbotron">

            <div class="row">
                <div class="col-md-4">
                    <img src="http://www.cmt.org.mx/webpage/wp-content/uploads/2014/11/logo.png" alt=""/>
                </div>
                <h2>Administrador de Enlaces</h2>


                <ul>
                    <li>Utilizar el Internet estrictamente para recibir y envíar e-mails, uso de WAZE y de manejo de información laboral.</li>
                    <li>Revisar minuciosamente toda la página de enlaces.</li>
                    <li>Revisar y preguntar dudas referente al FAIS para que sean respondidas en la pestaña de preguntas  y respuestas del administrador</li>

                </ul>

                
            </div>
            
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src=" {{ asset('/img/inicio/cmt.jpg')}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('/img/inicio/cmt2.jpg')}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
                <div class="item">
                    <img src="{{ asset('/img/inicio/cmt3.jpg')}}" alt="...">
                    <div class="carousel-caption">

                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>




@endsection
