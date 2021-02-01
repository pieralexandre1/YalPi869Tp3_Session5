var app = angular.module('myApp', []);
app.controller('vehiculesController', function ($scope, $http) {
    
// more angular JS codes will be here
$scope.showCreateForm = function () {
// clear form
$scope.clearForm();
// change modal title
$('#modal-vehicule-title').text("Create New Vehicule");
// hide update product button
$('#btn-update-vehicule').hide();
// show create product button
$('#btn-create-vehicule').show();
}
// clear variable / form values
$scope.clearForm = function () {
    $scope.id = "";
    $scope.plate = "";
    $scope.subcateogry_id = "";
}
// create new product 
$scope.createVehicule = function () {
// fields in key-value pairs

    
    $http.post('vehicules/addVehicule.json', {
        'plate': $scope.plate,
        'subcategory_id': $scope.subcategory_id
    }).success(function (data, status, headers, config) {
        console.log(data);
        // tell the user new product was created
        Materialize.toast("Vehicule has been created", 4000);
        // close modal
        $('#modal-vehicule-form').modal('close');
        // clear modal content
        $scope.clearForm();
        // refresh the list
        $scope.getAll();
    }).error(function (data, status, headers, config) {
        Materialize.toast('La plaque doit faire exactement 6 charactères.Type must be between 1 to 8.', 4000);
    });
}
// read products
$scope.getAll = function () {
    $http.get("vehicules/getVehicule.json").success(function (response) {
    $scope.plates = response.vehicules;
    });
}
// retrieve record to fill out the form
$scope.readOne = function (id) {
// change modal title
$('#modal-vehicule-title').text("Edit Vehicule");
// show udpate product button
$('#btn-update-vehicule').show();
// show create product button
$('#btn-create-vehicule').hide();
// post id of product to be edited
$http.post('vehicules/getVehicule.json', {
    'id': id
    }).success(function (data, status, headers, config) {
    // put the values in form
    $scope.id = data['vehicules']["id"];
    $scope.plate = data['vehicules']["plate"];
    $scope.subcategory_id = data['vehicules']["subcategory_id"];
    // show modal
    $('#modal-vehicule-form').modal('open');
    }).error(function (data, status, headers, config) {
        Materialize.toast('Unable to retrieve record.', 4000);
    });
}
// update product record / save changes
$scope.updateVehicule = function () {
    $http.post('vehicules/editVehicule.json', {
    'id': $scope.id,
    'plate': $scope.plate,
    'subcategory_id': $scope.subcategory_id
    }).success(function (data, status, headers, config) {
    // tell the user product record was updated
    Materialize.toast("Vehicule has been updated", 4000);
    // close modal
    $('#modal-vehicule-form').modal('close');
    // clear modal content
    $scope.clearForm();
    // refresh the product list
    $scope.getAll();
    }).error(function (data, status, headers, config) {
        Materialize.toast('La plaque doit faire exactement 6 charactères.Type must be between 1 to 8.', 4000);
    });
}
// delete product
$scope.deleteVehicule = function (id) {
// ask the user if he is sure to delete the record
    if (confirm("Are you sure?")) {
        // post the id of product to be deleted
        $http.post('vehicules/deleteVehicule.json', {
            'id': id
        }).success(function (data, status, headers, config) {
        // tell the user product was deleted
            Materialize.toast("Vehicule has been deleted", 4000);
            // refresh the list
            $scope.getAll();
        });
    }
}

});
// jquery codes will be here
$(document).ready(function () {
// initialize modal
$('.modal').modal();
$('select').material_select();
});