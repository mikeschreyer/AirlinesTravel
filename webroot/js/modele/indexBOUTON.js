// angular js codes will be here
var app = angular.module('CakeJwtAngularjs', []);

app.controller('usersCtrl', function ($scope, $http) {
    // more angular JS codes will be here

    // Login Process
    $scope.login = function () {

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
                // console.log(jsonData.data.token);
                // tell the user was logged
                Materialize.toast('User sucessfully logged in', 4000);
                localStorage.setItem('token', jsonData.data.token);
                localStorage.setItem('user_id', jsonData.data.id);
                // Switch button for Logout
                $('#login-btn').hide();
                $('#logout-btn').show();
            })
            .error(function (data, status, headers, config) {
                //console.log(data.response.result);
                // tell the user was not logged
                Materialize.toast(data.message, 4000);
            });
        // close modal
        $('#modal-login-form').modal('close');
    }
    // Login Process
    $scope.logout = function () {
        localStorage.setItem('token', "no token");
        $('#logout-btn').hide();
        $('#login-btn').show();
        // show modal
        $('#modal-logout-form').modal('close');
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
                // tell the user subcategory record was updated
                Materialize.toast('Password successfully changed', 4000);
                // close modal
                $('#modal-logout-form').modal('close');
            })
            .error(function (response) {
                // tell the user subcategory record was not updated
                //console.log(response);
                Materialize.toast('Could not update Password', 4000);

            });
    }
});

app.controller('modeleCtrl', function ($scope, $http) {

    // create new subcategory
    $scope.createModele = function () {
        var req = {
            method: 'POST',
            url: 'api/modele',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {'name': $scope.newName, 'modele_id': $scope.createModele.id}
        }
        $http(req)
            .success(function (response) {
                //console.log(data.response.result);
                // tell the user new subcategory was created
                Materialize.toast('Modele successfully created', 4000);

                // close modal
                $('#modal-createModele-form').modal('close');

                // refresh the list
                $scope.getAll();
            })
            .error(function (response) {
                //console.log(data.response.result);
                // tell the user new subcategory was created
                Materialize.toast('Could not create modele', 4000);
            });
    }
    // read subcategories
    $scope.getAll = function () {
        var req = {
            method: 'GET',
            url: 'api/modele',
            headers: {
                'Accept': 'application/json'
            }
        }
        $http(req)
            .success(function (response) {
                $scope.names = response.data;
            })
            .error(function (response) {
                // tell the user subcategories are not accessible
                Materialize.toast('Could not retreive modele', 4000);
            })
        ;
    }
    // retrieve record to fill out the form
    $scope.readOne = function (id) {
        if (localStorage.getItem("token") === "no token") {
            Materialize.toast('Please login', 4000);
        } else {

            var req = {
                method: 'GET',
                url: 'api/modele/' + id,
                headers: {
                    'Accept': 'application/json'
                }
            }
            $http(req)
                .success(function (jsonData, status, headers, config) {
                    //console.log(jsonData.data);
                    // put the values in form
                    $scope.id = jsonData.data.id;
                    $scope.actualName = jsonData.data.name;
                })
                .error(function (response) {
                    Materialize.toast('Unable to retrieve record.', 4000);
                });
        }
    }

    // update subcategory record / save changes
    $scope.updateModele = function () {
        var req = {
            method: 'PUT',
            url: 'api/modele/' + $scope.id,
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            data: {'name': $scope.actualName, 'modele_id': $scope.editModele.id}
        }
        $http(req)
            .success(function (response) {
                // tell the user subcategory record was updated
                Materialize.toast('Modele successfully updated', 4000);
                // close modal
                $('#modal-editModele-form').modal('close');
                // refresh the subcategory list
                $scope.getAll();
            })
            .error(function (response) {
                // tell the user subcategory record was not updated
                //console.log(response);
                Materialize.toast('Could not update modele', 4000);

            });
    }
    // delete subcategory
    $scope.deleteModele = function (id) {
        //console.log(localStorage.getItem("token"));
        if (localStorage.getItem("token") === "no token") {
            Materialize.toast('Please login', 4000);
        } else {

            if (confirm("Are you sure?")) {

                var req = {
                    method: 'DELETE',
                    url: 'api/modele/' + id,
                    headers: {
                        'Accept': 'application/json',
                    }
                }
                $http(req)
                    .success(function (response) {
                        Materialize.toast('Modele successfully deleted', 4000);
                        $scope.getAll();
                    })
                    .error(function (response) {
                        // tell the user subcategory was not deleted
                        Materialize.toast('Could not modele', 4000);
                    })
                ;
            }
        }
    }
});

// jquery codes will be here
$(document).ready(function () {
    // initialize modal
    $('.modal').modal();
    localStorage.setItem('token', "no token");
    $('#logout-btn').hide();
});



