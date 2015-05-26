@extends('app')


@section('content')

    <div class="container">

        <h2>Directorio de Dependencias</h2>

        <div ng-controller="mainController">

            <h3>Pais</h3>
            <select ng-change="getStates(selectedCountry)" ng-model="selectedCountry">
                <option ng-repeat="country in countries" value="<% country.id%>"><% country.name %></option>

            </select>

            <h3>Estados</h3>

            <select ng-change="getCities(selectedState)" ng-model="selectedState">
                <option ng-repeat="state in states" value="<% state.id %>"><% state.name %></option>

            </select>

            <h3>Municipios</h3>
            <select ng-change="getLocations(selectedCity)" ng-model="selectedCity">
                <option ng-repeat="city in cities" value="<% city.id %>"><% city.name %></option>
            </select>

            <h3>Localidades</h3>
            <select >

                <option ng-repeat="location in locations" value="<% location.id %>"><% location.name %></option>
            </select>


                <h2>Directorio de Grupos</h2>


         </div>

    </div>

@endsection