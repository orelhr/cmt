@extends('app')


@section('content')



        <h3 class="text-center">Directorio de Dependencias</h3>

        <div ng-controller="mainController">

            <div class="form-group col-md-4">
                <label>Pais </label>
                <select class="form-control" ng-change="getStates(selectedCountry)" ng-model="selectedCountry">
                    <option ng-repeat="country in countries" value="<% country.id%>"><% country.name %></option>
                </select>
            </div>
            
            
            <div class="form-group col-md-4">
                <label>Estado</label>
                <select class="form-control" ng-change="getCities(selectedState)" ng-model="selectedState">
                    <option ng-repeat="state in states" value="<% state.id %>"><% state.name %></option>
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label>Municipios</label>
                <select class="form-control" ng-change="getLocations(selectedCity)" ng-model="selectedCity">
                    <option ng-repeat="city in cities" value="<% city.id %>"><% city.name %></option>
                </select>
            </div>
            
            <div class="form-group col-md-4">
                <label>Localidades</label>
                <select class="form-control">
                    <option ng-repeat="location in locations" value="<% location.id %>"><% location.name %></option>
                </select>
            </div>
           
            

            <!-- Tabla de Contactos y dependencias -->
            <table class="table table-stripped">
                
            </table>

         </div>



@endsection