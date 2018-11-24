var app = angular.module('linkedlists', []);

app.controller('modeleController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.modele = response.data;
    });
});

