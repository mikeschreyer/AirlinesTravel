//commit final pour problem avec erreur 404
var app = angular.module('app',[]);

app.controller('ModeleCRUDCtrl', ['$scope','ModeleCRUDService', function ($scope,ModeleCRUDService) {

    $scope.updateModele = function () {
        ModeleCRUDService.updateModele($scope.modele.id,$scope.modele.name)
            .then(function success(response){
                    $scope.message = 'Modele data updated!';
                    $scope.errorMessage = '';
                },
                function error(response){
                    $scope.errorMessage = 'Error updating modele!';
                    $scope.message = '';
                });
    }

    $scope.getModele = function () {
        var id = $scope.modele.id;
        ModeleCRUDService.getModele($scope.modele.id)
            .then(function success(response){
                    $scope.modele = response.data;
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

    $scope.deleteModele = function () {
        ModeleCRUDService.deleteModele($scope.modele.id)
            .then (function success(response){
                    $scope.message = 'Modele deleted!';
                    $scope.modele = null;
                    $scope.errorMessage='';
                },
                function error(response){
                    $scope.errorMessage = 'Error deleting modele!';
                    $scope.message='';
                })
    }

    $scope.getAllModeles = function () {
        ModeleCRUDService.getAllModeles()
            .then(function success(response){
                    $scope.modele = response.data.modele;
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
            url: 'modele/'+modeleId
        });
    }

    this.addModele= function addModele(name){
        return $http({
            method: 'POST',
            url: 'modele',
            data: {name:name}
        });
    }

    this.deleteModele= function deleteModele(id){
        return $http({
            method: 'DELETE',
            url: 'modele/'+id
        })
    }

    this.updateModele= function updateModele(id,name){
        return $http({
            method: 'PATCH',
            url: 'modele/'+id,
            data: {name:name}
        })
    }

    this.getAllModeles= function getAllModeles(){
        return $http({
            method: 'GET',
            url: 'modele'
        });
    }

}]);
