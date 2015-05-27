@extends('app')


@section('content')

    <div class="container">

        <h2>Directorio de Dependencias</h2>

        <div ng-controller="mainController">

            <h3>Pais</h3>


            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    <% nameCountry %>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation" ng-repeat="country in countries" value="<% country.id%>">
                        <a role="menuitem" tabindex="-1" href="#" ng-click="getStates(country.id,country.name)"><% country.name %></a>
                    </li>

                </ul>
            </div>
            <h3>Estados</h3>

            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
                    <% nameState %>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation" ng-repeat="state in states" value="<% state.id%>">
                        <a role="menuitem" tabindex="-1" href="#" ng-click="getCities(state.id,state.name)"><% state.name %></a>
                    </li>

                </ul>
            </div>

            <h3>Municipios</h3>

            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-expanded="true">
                    <% nameCity %>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation" ng-repeat="city in cities" value="<% city.id%>">
                        <a role="menuitem" tabindex="-1" href="#" ng-click="getLocations(city.id,city.name)"><% city.name %></a>
                    </li>

                </ul>
            </div>

            <h3>Localidades</h3>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-expanded="true">
                    <% nameLocation %>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li role="presentation" ng-repeat="location in locations" value="<% location.id%>">
                        <a role="menuitem" tabindex="-1" href="#" ><% location.name %></a>
                    </li>

                </ul>
            </div>

            <!-- Tabla de Contactos y dependencias -->


            <table class="table table-striped">


            </table>




         </div>

    </div>

@endsection