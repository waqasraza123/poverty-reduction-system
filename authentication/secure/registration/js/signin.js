var app = angular.module('app', ['ui.bootstrap']);

app.controller('mainController', function ($scope) {

    // BUTTONS ======================

    // define some random object and button values
    $scope.bigData = {};

    $scope.bigData.breakfast = false;
    $scope.bigData.lunch = false;
    $scope.bigData.dinner = false;

    // COLLAPSE =====================
    $scope.isCollapsed = false;
    $scope.attmsuccess=false;
    $scope.attmfailure=false;
    $scope.result="";


});

app.controller("forms", function ($scope,$http,$window) {
    $scope.signup = true;
    $scope.notpass=false;
    $scope.submit_signup = function () {
            $scope.attmfailure=false;
        if($scope.dsign.username.length<6){
            $scope.result = "Error Username at least 6 character long";
                $scope.attmfailure=true;
            return
        }
        else if($scope.dsign.password.length<6){
            $scope.result = "Error password should be at least 6 character long";
            $scope.attmfailure=true;
            return;
        }
         if($scope.dsign.password!=$scope.dsign.password2){
            $scope.result = "Error password mismatch";
            $scope.attmfailure=true;
            return;
        }
        window.console.log($scope.dsign);
        $http({
            method: 'POST',
            url: './plat_signup.php',
            data: $scope.dsign
        }).success(function (data) {
            //            $scope.tweet = {};
            //            $scope.refreshtweets();
            if (data.success == 1){
                $scope.result = "Successful Signup. Opening Portal...";
                
                localStorage.setItem("user_details",JSON.stringify($scope.dsign));
                $scope.dsign.password="";
                $scope.attmsuccess=true;
                $window.location = '../login?msg=success';
            }
            else{
                $scope.result = data.errors;
                $scope.attmfailure=true;
            }
            window.console.log(data);

        });
    }
    $scope.matchpass=function(){
        if($scope.dsign.password!=$scope.dsign.password2){
            $scope.notpass=true;
        }
    }

});