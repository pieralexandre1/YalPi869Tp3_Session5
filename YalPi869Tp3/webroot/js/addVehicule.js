var app = angular.module('linkedlists', []);

app.controller('categoriesController', function ($scope, $http) {
    var url = "http://127.0.0.1:8000/YalPi869Tp3/categories/getCategories.json";

    $http.get(url).then(function (response) {
        $scope.categories = response.data;
    });
});



