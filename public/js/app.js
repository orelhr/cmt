
(function() {
    var app = angular.module('Application', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });



    var mainController = function ($scope, $http, $location, $log) {

        //get base url used in case of change the original path
        var urlBase= function(){

            var result= $location.absUrl().substring(0,$location.absUrl().indexOf("public")-1);

            return result;
        }

       $location.base= urlBase();
        


        $http.get($location.base+"/public/directory/countries")
            .then(function (response) {

                $scope.countries = response.data;
                $scope.nameCountry="Pais";
                $scope.nameState="Estado";
                $scope.nameCity="Ciudad";
                $scope.nameLocation="Localidad";

            }, function (error) {

                $scope.error1 = JSON.stringify(error);
            });

        $scope.getStates = function (id,name) {

            $http.get($location.base+"/public/directory/states/" + id)
                .then(function (response) {

                    $scope.states = response.data;
                    $scope.nameCountry=name;
                    $scope.nameState="Estado";
                    $scope.nameCity="Ciudad";
                    $scope.nameLocation="Localidad";
                }, function (error) {

                    $scope.error2 = JSON.stringify(error);
                });
        };
       $scope.getCities= function(selectedState,name){



            $http.get($location.base+"/public/directory/cities/" + selectedState)
                .then(function (response){

                   $scope.cities= response.data;

                    $scope.nameState=name;
                    $scope.nameCity="Ciudad";
                    $scope.nameLocation="Localidad";
                }, function(error){

                    $scope.error3= JSON.stringify(error);
                });
       };
        $scope.getLocations= function(selectedCity,name){

            $http.get($location.base+"/public/directory/locations/"+ selectedCity)
                .then(function(response){
                    $scope.locations= response.data;

                    $scope.nameCity=name;
                    $scope.nameLocation="Localidad";

                },function(error){

                    $scope.error4= JSON.stringify(error);
                });

        };
        $scope.getDependency= function (selectedLocation){

            $http.get($location.base+"/public/directory/dependency/"+ selectedLocation)
                .then(function (response){

                    $scope.dependency= response.data;

                }, function (error){

                    $scope.error5= JSON.stringify(error);
                });

        };


    };



    var ReportController= function ($scope){

        $scope.monday=0;
        $scope.tuesday=0;
        $scope.wednesday=0;
        $scope.thursday=0;
        $scope.friday= 0;
        $scope.saturday= 0;
        $scope.test=false;
    };


    app.controller("mainController", ["$scope", "$http","$location","$log", mainController]);

    app.controller('ReportController',["$scope",ReportController]);

})();