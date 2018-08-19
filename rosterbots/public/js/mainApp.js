var app = angular.module('mainApp', ['mainRoutes', 'rosterBotsService', 'ngAnimate', 'toastr', 'ui.bootstrap']);

app.config(['$locationProvider', function ($locationProvider) {
    $locationProvider.hashPrefix('');
    $locationProvider.html5Mode(true);
}]);

app.controller('mainController', ['$scope', '$http', 'toastr', 'rosterBotsService', '$routeParams', function ($scope, $http, toastr, rosterBotsService, $routeParams) {
    var initializeTodos = function () {
        rosterBotsService.getActiveTeams().then(function (data) {
            $scope.teams = data.data;
            $scope.anyActiveTeams = $scope.teams.length;
            console.log($scope.teams);
        });
    }

    initializeTodos();

    $scope.addTeam = function () {
        var input = $scope.myinput;

        rosterBotsService.add(input).then(function (data) {
            $scope.myinput = '';
            toastr.success('Successfully added!', 'Success');
            //$scope.anyActiveTodos = true;

            initializeTodos();
            $scope.teams.push({
                teamId: data.teamId,
                teamName: input
            });
        }, function () {
            toastr.error('Something went wrong. Please try again', 'Fail');
        });
    }
    $scope.delete = function (id) {

        console.log("Team Deleted!");
        console.log(id);

        rosterBotsService.delete(id).then(function () {

            initializeTodos();
            toastr.success('Team deleted!', 'Success');

        });
    }
    $scope.$on('$locationChangeStart', function (event) {
        $scope.teamId = $routeParams.teamId;
    });

}]);

app.controller('playerController', ['$scope', '$http', 'toastr', 'rosterBotsService', '$routeParams', function ($scope, $http, toastr, rosterBotsService, $routeParams) {
    var initializeTodos = function () {
        $scope.teamId = $routeParams.teamId;
        rosterBotsService.getById($scope.teamId).then(function (data) {
            $scope.team = data.data;
            //$scope.totalPlayers = $scope.players.length;

            console.log($scope.team);
        });
        rosterBotsService.getActivePlayersByTeam($scope.teamId).then(function (data) {
            $scope.players = data.data.records;
            $scope.totalPlayers = $scope.players.length;
            console.log($scope.players);
        });


    }

    initializeTodos();

    $scope.goBack = function () {
        window.history.back();
    };

    $scope.fill = function () {
        rosterBotsService.createRandomPlayers($scope.teamId).then(function (data) {
            //$scope.players = data.data.records;
            toastr.success('Successfully added!', 'Success');
            initializeTodos();
            $scope.players.push({
                playerId: data.data.records.playerId,
                playerName: data.data.records.playerName,
                playerTypeId: data.data.records.playerTypeId,
                speed: data.data.records.speed,
                strength: data.data.records.strength,
                agility: data.data.records.agility,
                total: data.data.records.total,
                salary: data.data.records.salary
            });
        }, function () {
            toastr.error('Something went wrong. Please try again', 'Fail');
        });
    }

    $scope.delete = function (id) {

        console.log("Player Deleted!");
        console.log(id);

        rosterBotsService.deletePlayer(id).then(function () {

            initializeTodos();
            toastr.success('Team deleted!', 'Success');

        });
    }

}]);
