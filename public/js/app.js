
function onGoogleReady() {
  angular.bootstrap(document.getElementById("map"), ['Application']);
}
(function() {
    var app = angular.module('Application', ['ui.map'], function ($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    var appointmentController= function ($scope, $http, $location, $log){

        var getIdDailySchedule=function(){

            var indexId = $location.absUrl().substring($location.absUrl().indexOf("/editappointment")+16);
            return indexId;


        };
        // get Options variables
        var urlBase= function(){

            var result= $location.absUrl().substring(0,$location.absUrl().indexOf("public")-1);

            return result;
        };

       $location.base= urlBase();
       $scope.dailyId= getIdDailySchedule();

       $scope.getCharacterByDailyId= function(){

       $http.get($location.base+"/public/directory/characterByDailyId"+$scope.dailyId).then(
        function(response){

            $scope.character=response.data.character;

        }

        ,function(error){

        $scope.error1=JSON.stringify(error);
       });

        };
        $scope.getLocationsByDailyId= function(){

            $http.get($location.base+"/public/directory/locationByDailyId"+$scope.dailyId).then(
                function(response){

                    $scope.locations=response.data;
                },function(error){
                    $scope.errorlocation= JSON.stringify(error);
                });
        };
      
         $scope.getOption=function (newvalue, oldvalue){
            $scope.select=true;

            if($scope.character==undefined)
                $scope.getCharacterByDailyId();
            if($scope.character=="first"){
                $scope.firstMeeting=true;
                $scope.followingMeeting=false;
                $scope.agreementMeeting=false;
            };
            if($scope.character=="following"){
                $scope.firstMeeting=false;
                $scope.followingMeeting=true;
                $scope.agreementMeeting=false;
            };
            if($scope.character=="agreement"){
                $scope.firstMeeting=false;
                $scope.followingMeeting=false;
                $scope.agreementMeeting=true;
            };

           
        };

        $scope.locationValidation= function(newvalue,oldvalue){

            if($scope.locations==undefined)
                $scope.getLocationsByDailyId();
        };

// Initialize type meeting 
        $scope.$watch('character', $scope.getOption);

        $scope.$watch('locations', $scope.locationValidation);


    }

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
               

            }, function (error) {

                $scope.error1 = JSON.stringify(error);
            });

        $scope.getStates = function (id,name) {

            $http.get($location.base+"/public/directory/states/" + id)
                .then(function (response) {

                    $scope.states = response.data;
                   
                }, function (error) {

                    $scope.error2 = JSON.stringify(error);
                });
        };
       $scope.getCities= function(selectedState,name){



            $http.get($location.base+"/public/directory/cities/" + selectedState)
                .then(function (response){

                   $scope.cities= response.data;

                   
                }, function(error){

                    $scope.error3= JSON.stringify(error);
                });
       };
        $scope.getLocations= function(selectedCity,name){

            $http.get($location.base+"/public/directory/locations/"+ selectedCity)
                .then(function(response){
                    $scope.locations= response.data;

                    

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

    var MapsController= function ($scope,$location,$http){

       var urlBase= function(){

            var result= $location.absUrl().substring(0,$location.absUrl().indexOf("public")-1);

            return result;
        }

       $location.base= urlBase();



       $scope.getLocations = function (daySelected){
            var vacio="";
            var param= daySelected || vacio ;
            if(param!=vacio)
                param="/"+param;
            var url= $location.base+"/public/maps/getLocations"+param;

            
           
            $http.get(url)
            .then(function(response){
               
            }, function(error){
                 $scope.error5= JSON.stringify(error);
            } );

       };
       $scope.getLocations();
       

       $scope.mapOptions = {
          center: new google.maps.LatLng(23.8225, -103.036),
          zoom: 4,
          mapTypeId: google.maps.MapTypeId.ROADMAP
         };

    };

    app.controller("appointmentController", ["$scope","$http", "$location","$log",appointmentController]);

    app.controller("mainController", ["$scope", "$http","$location","$log", mainController]);

    app.controller('ReportController',["$scope",ReportController]);

    app.controller('MapsController',["$scope","$location","$http", MapsController]);

})();