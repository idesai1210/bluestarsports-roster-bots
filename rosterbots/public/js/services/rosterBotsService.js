var app = angular.module('rosterBotsService', []);

app.factory('rosterBotsService', ['$http', function ($http) {
    var api_v1 = '/api/';
    return {
        add: function (teamName) {
            var model = {
                "teamName": teamName
            }
            model = JSON.stringify(model)
            return $http.post(api_v1 + 'teams', model);
        },
        getActiveTeams: function () {
            return $http.get(api_v1 + 'teams');
        },
        getActivePlayersByTeam: function (teamId) {
            return $http.get(api_v1 + 'teams' + '/' + teamId + '/players');
        },
        get: function () {
            return $http.get(api_v1 + 'teams');
        },
        getById: function (teamId) {
            return $http.get(api_v1 + 'teams/' + teamId);
        },
        createRandomPlayers: function (teamId) {
            return $http.get(api_v1 + 'teams/' + teamId + '/create');
        },
        createOneRandomPlayer: function(teamId){
            return $http.get(api_v1 + 'teams/' + teamId + '/createone');
        },
        delete: function (teamId) {
            return $http.delete(api_v1 + 'teams' + '/' + teamId);
        },
        deletePlayer: function (playerId) {
            return $http.delete(api_v1 + 'players/' + playerId);
        }
    };
}]);
