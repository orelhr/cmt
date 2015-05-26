
(function() {
    var app = angular.module('Application', [], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });


    var mainController = function ($scope, $http, $location, $log) {


        $http.get("http://localhost:8081/laravel/cmt/public/directory/countries")
            .then(function (response) {

                $scope.countries = response.data;

            }, function (error) {

                $scope.error1 = JSON.stringify(error);
            });

        $scope.getStates = function (id) {

            $http.get("http://localhost:8081/laravel/cmt/public/directory/states/" + id)
                .then(function (response) {

                    $scope.states = response.data;
                }, function (error) {

                    $scope.error2 = JSON.stringify(error);
                });
        };
       $scope.getCities= function(selectedState){



            $http.get("http://localhost:8081/laravel/cmt/public/directory/cities/" + selectedState)
                .then(function (response){

                   $scope.cities= response.data;
                }, function(error){

                    $scope.error3= JSON.stringify(error);
                });
       };
        $scope.getLocations= function(selectedCity){

            $http.get("http://localhost:8081/laravel/cmt/public/directory/locations/"+ selectedCity)
                .then(function(response){
                    $scope.locations= response.data;

                },function(error){

                    $scope.error4= JSON.stringify(error);
                });

        };


    };

    app.controller("mainController", ["$scope", "$http","$location","$log", mainController]);

})();