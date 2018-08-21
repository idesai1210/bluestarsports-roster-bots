var app = angular.module('mainApp', ['mainRoutes', 'rosterBotsService', 'ngAnimate', 'toastr', 'ui.bootstrap','angularUtils.directives.dirPagination']);


app.controller('mainController', ['$scope', '$http', 'toastr', 'rosterBotsService', '$routeParams', function ($scope, $http, toastr, rosterBotsService, $routeParams) {
    var initializeTodos = function () {
        rosterBotsService.getActiveTeams().then(function (data) {
            $scope.teams = data.data.records;
            $scope.anyActiveTeams = $scope.teams.length;
            console.log($scope.teams);
        });
    }

    initializeTodos();

    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

    $scope.addTeam = function () {
        var input = $scope.myinput;

        rosterBotsService.add(input).then(function (data) {
            $scope.myinput = '';
            toastr.success('Successfully added!', 'Success');
            //$scope.anyActiveTodos = true;

            initializeTodos();
            $scope.teams.push({
                teamId: data.data.records.teamId,
                teamName: input,
                starters: data.data.records.starters,
                substitutes: data.data.records.substitutes,
                salary: data.data.records.salary
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

        $scope.createOnePlayer = "Create a Player";
        $scope.fillLineUp = "Fill Line Up";
    }

    initializeTodos();

    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

    $scope.goBack = function () {
        window.history.back();
    };

    $scope.fill = function () {
        $scope.fillLineUp = "Filling Team Sheet...";
        $scope.enable1 = "false";
        rosterBotsService.createRandomPlayers($scope.teamId).then(function (data) {
            //$scope.players = data.data.records;
            $scope.enable1 = "true";
            $scope.createOnePlayer = "Fill Line Up";
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

    $scope.createOne = function(){
        $scope.createOnePlayer = "Creating...";
        $scope.enable = "false";
        rosterBotsService.createOneRandomPlayer($scope.teamId).then(function (data) {
            //$scope.players = data.data.records;
            $scope.enable = "true";
            $scope.createOnePlayer = "Create a Player";
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
