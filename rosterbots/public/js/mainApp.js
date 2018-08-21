var app = angular.module('mainApp', ['mainRoutes', 'rosterBotsService', 'ngAnimate', 'toastr', 'ui.bootstrap','angularUtils.directives.dirPagination']);


app.controller('mainController', ['$scope', '$http', 'toastr', 'rosterBotsService', '$routeParams', function ($scope, $http, toastr, rosterBotsService, $routeParams) {
    var initializeTodos = function () {
        rosterBotsService.getActiveTeams().then(function (data) {
            $scope.teams = data.data.records;
            $scope.anyActiveTeams = $scope.teams.length;
        });
        $scope.index = 0;
    }

    initializeTodos();

    $scope.sort = function(keyname){
        $scope.sortKey = keyname;   //set the sortKey to the param passed
        $scope.reverse = !$scope.reverse; //if true make it false and vice versa
    }

    $scope.addTeam = function (isValid) {
        var input = $scope.myinput;
        if(input === ""){
            toastr.error('Team name cannot be empty. Please enter a valid team name!', 'Fail');
        }else {

            rosterBotsService.add(input).then(function (data) {
                $scope.myinput = '';
                toastr.success('Successfully added!', 'Success');
                //$scope.anyActiveTodos = true;

                initializeTodos();
                // $scope.teams.push({
                //     teamId: data.data.records.teamId,
                //     teamName: input,
                //     starters: data.data.records.starters,
                //     substitutes: data.data.records.substitutes,
                //     salary: data.data.records.salary
                // });

            }, function () {
                toastr.error('Something went wrong. Please try again', 'Fail');
            });
        }
    }
    $scope.delete = function (id) {

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
        });
        rosterBotsService.getActivePlayersByTeam($scope.teamId).then(function (data) {
            $scope.players = data.data.records;
            $scope.totalPlayers = $scope.players.length;
        });

        $scope.createOnePlayer = "Create New Player";
        $scope.fillLineUp = "Fill Line Up";
        $scope.deleteLineUp = "Delete Line Up";
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
            if(data.data.result == 'fail'){
                $scope.enable1 = "true";
                $scope.createOnePlayer = "Fill Line Up";
                toastr.error('Roster already has 15 Players', 'Fail');
                initializeTodos();
            }else {
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
            }
        }, function () {
            toastr.error('Something went wrong. Please try again', 'Fail');
        });
    }

    $scope.createOne = function(){
        $scope.createOnePlayer = "Creating...";
        $scope.enable = "false";
        rosterBotsService.createOneRandomPlayer($scope.teamId).then(function (data) {
            //$scope.players = data.data.records;
            if(data.data.result == 'fail'){
                $scope.enable = "true";
                $scope.createOnePlayer = "Fill Line Up";
                toastr.error('Roster already has 15 Players', 'Fail');
                initializeTodos();
            }else {
                $scope.enable = "true";
                $scope.createOnePlayer = "Create New Player";
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
            }
        }, function () {
            toastr.error('Something went wrong. Please try again', 'Fail');
        });
    }

    $scope.deleteAll = function(){

        $scope.deleteLineUp = "Removing Players..."
        $scope.enable2 = "false";
        rosterBotsService.deleteAllPlayersByTeam($scope.teamId).then(function(data){
            $scope.enable2 = "true";
            $scope.deleteLineUp = "Delete Line Up";
            toastr.success('Successfully deleted!', 'Success');
            initializeTodos();
            // $scope.players.push({
            //     playerId: data.data.records.playerId,
            //     playerName: data.data.records.playerName,
            //     playerTypeId: data.data.records.playerTypeId,
            //     speed: data.data.records.speed,
            //     strength: data.data.records.strength,
            //     agility: data.data.records.agility,
            //     total: data.data.records.total,
            //     salary: data.data.records.salary
            // });
        }, function () {
            toastr.error('Something went wrong. Please try again', 'Fail');
        });

    }

    $scope.delete = function (id) {

        rosterBotsService.deletePlayer(id).then(function () {

            initializeTodos();
            toastr.success('Player deleted!', 'Success');

        });
    }

}]);
