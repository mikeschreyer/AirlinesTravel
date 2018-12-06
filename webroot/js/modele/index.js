var onloadCallback = function() {
    widgetId1 = grecaptcha.render('captcha', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('CakeJwtAngularjs', []);


app.controller('usersCtrl', function ($scope, $http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function () {
        if (grecaptcha.getResponse(widgetId1) == '') {
            $scope.captcha_status = 'Please verify captha.';
            return;
        }
        var req = {
            method: 'POST',
            url: 'api/users/token',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {username: $scope.username, password: $scope.password}
        }
        // fields in key-value pairs
        $http(req)
            .success(function (jsonData, status, headers, config) {
                //console.log(jsonData.data.token);
                localStorage.setItem('token', jsonData.data.token);
                localStorage.setItem('user_id', jsonData.data.id);
                alert("Login succes");
                $('#login-btn').hide();
                $('#logout-btn').show();
                $('#change-btn').show();
                $('#username').val("");
                $('#password').val("");

            })
            .error(function (data, status, headers, config) {
                //console.log(data.response.result);
                alert("Login error");
                $('#username').val("");
                $('#password').val("");

            });
    }
    // Login Process
    $scope.logout = function () {
        localStorage.setItem('token', "no token");
        alert("Logout");
        $('#logout-btn').hide();
        $('#login-btn').show();
        $('#username').val("");
        $('#password').val("");
        $scope.captcha_status = '';

    }
    $scope.changePassword = function () {
        var req = {
            method: 'PUT',
            url: 'api/users/' + localStorage.getItem("user_id"),
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem("token")
            },
            data: {'password': $scope.newPassword}
        }
        $http(req)
            .success(function (response) {
                alert("Password change succes")
                $('#username').val("");
                $('#password').val("");
                $('#newPassword').val("");
                $('#change-btn').hide();

            })
            .error(function (response) {
                // tell the user subcategory record was not updated
                alert("Password change error")
                $('#username').val("");
                $('#password').val("");
                $('#newPassword').val("");

            });
    }

    localStorage.setItem('token', "no token");
});





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
        if (localStorage.getItem("token") === "no token") {
            alert("Please login");
        } else {
            return $http({
                method: 'GET',
                url: 'api/modele/' + modeleId,
                headers: {'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json'}
            });
        }
    }

    this.addModele= function addModele(name){
        if (localStorage.getItem("token") === "no token") {
            alert("Please login");
        } else {
            return $http({
                method: 'POST',
                url: 'api/modele',
                headers: {'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json'},
                data: {name: name}
            });
        }
    }

    this.deleteModele= function deleteModele(id){
        if (localStorage.getItem("token") === "no token") {
            alert("Please login");
        } else {
            return $http({
                method: 'DELETE',
                url: 'api/modele/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json'}
            });
        }
    }

    this.updateModele= function updateModele(id,name){
        if (localStorage.getItem("token") === "no token") {
            alert("Please login");
        } else {
            return $http({
                method: 'PATCH',
                url: 'api/modele/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json'},
                data: {name: name}
            });
        }
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
    localStorage.setItem('token', "no token");
    $('#logout-btn').hide();
});
