var myapp = angular.module("myapp", []);
myapp.controller('UsersController', function ($scope, $http) {

 $scope.change = function() {
     $scope.resultsucces = null;
     $scope.result = null;
     $scope.result = angular.equals($scope.password, $scope.confirmPassword);
     if($scope.password){
     }else{
         $scope.result = "Password cant be empty";
     }
     $http.post('../../api/users/token', {
            'email': $scope.email,
            'password': $scope.previouspassword
        },{headers:{'Accept': 'application/json','Content-Type': 'application/json'}}).success(function (data, status, headers, config) {
            $scope.authorization = data['data']['token'];
            if ($scope.result) {
                $scope.result = null;
                $http.post('../../users/changepassword/' + $scope.id + '.json', {
                    'id': $scope.id,
                    'password': $scope.password
                },{headers:{'Accept': 'application/json','Content-Type': 'application/json','Authorization': 'Bearer ' + $scope.authorization}}).success(function (data, status, headers, config) {
                    $scope.resultsucces = "Password has been modified";
                }).error(function (data, status, headers, config) {
                    $scope.result = "A error has occured";
                });
            }else{
                $scope.result = "Password doesn't match";
            }
        }).error(function (data, status, headers, config) {
            $scope.result = "The previous password is wrong";
        });
     
    
    }

});

$(document).ready(function () {
});