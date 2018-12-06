var app = angular.module('app', []);

app.controller('ModeleCRUDCtrl', ['$scope','ModeleCRUDService', function ($scope,ModeleCRUDService) {

    $scope.updateModele = function (id) {
        ModeleCRUDService.updateModele($scope.modele.id,$scope.modele.name)
            .then(function success(response){
                    $scope.message = 'Modele data updated!';
                    $scope.errorMessage = '';
                    $scope.getAllModele();
                },
                function error(response){
                    $scope.errorMessage = 'Error updating modele!';
                    $scope.message = '';
                });
    }

    $scope.getModele = function (id) {
        ModeleCRUDService.getModele(id)
            .then(function success(response){
                    $scope.modele = response.data.data;
                    $scope.modele.id = id;
                    $scope.message='';
                    $scope.errorMessage = '';
                },
                function error (response ){
                    $scope.message = '';
                    if (response.status === 404){
                        $scope.errorMessage = 'Modele not found!';
                    }
                    else {
                        $scope.errorMessage = "Error getting modele!";
                    }
                });
    }

    $scope.addModele = function () {
        if ($scope.modele != null && $scope.modele.name) {
            ModeleCRUDService.addModele($scope.modele.name)
                .then (function success(response){
                        $scope.message = 'Modele added!';
                        $scope.errorMessage = '';
                        $scope.getAllModele();
                    },
                    function error(response){
                        $scope.errorMessage = 'Error adding modele!';
                        $scope.message = '';
                    });
        }
        else {
            $scope.errorMessage = 'Please enter a name!';
            $scope.message = '';
        }
    }

    $scope.deleteModele = function (id) {
        ModeleCRUDService.deleteModele(id)
            .then (function success(response){
                    $scope.message = 'Modele deleted!';
                    $scope.modele = null;
                    $scope.errorMessage='';
                    $scope.getAllModele();
                },
                function error(response){
                    $scope.errorMessage = 'Error deleting modele!';
                    $scope.message='';
                })
    }

    $scope.getAllModele = function () {
        ModeleCRUDService.getAllModele()
            .then(function success(response){
                    $scope.modele = response.data.data;
                    $scope.message='';
                    $scope.errorMessage = '';
                },
                function error (response){
                    $scope.message='';
                    $scope.errorMessage = 'Error getting modele!';
                });
    }

}]);




app.service('ModeleCRUDService',['$http', function ($http) {

    this.getModele = function getModele(modeleId){
        return $http({
            method: 'GET',
            url: 'api/modele/'+ modeleId,
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    }

    this.addModele= function addModele(name){
        return $http({
            method: 'POST',
            url: 'api/modele',
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'},
            data: {name:name}
        });
    }

    this.deleteModele= function deleteModele(id){
        return $http({
            method: 'DELETE',
            url: 'api/modele/'+id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}
        });
    }

    this.updateModele= function updateModele(id,name){
        return $http({
            method: 'PATCH',
            url: 'api/modele/'+id,
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'},
            data: {name:name}
        });
    }

    this.getAllModele= function getAllModele(){
        return $http({
            method: 'GET',
            url: 'api/modele',
            headers: { 'X-Requested-With' : 'XMLHttpRequest', 'Accept' : 'application/json'}

        });
    }
}]);

$(document).ready(function () {
    // initialize modal
    $('.modal').modal();
    localStorage.setItem('token', "no token");
    $('#logout-btn').hide();
});
