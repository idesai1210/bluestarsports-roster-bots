<div class="row">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>{{team.teamName}}</h1>
            <div>
                <button type="button" ng-click="goBack()" class="btn btn-default"><i class="fas fa-chevron-left"></i> Go
                    Back To List Of Teams
                </button>
            </div>
            <br>
            <div>
                <button type="button" ng-click="createOne(team.teamId)" class="btn btn-info" ng-disabled="enable=='false'">
                    <span ng-show="createOnePlayer == 'Creating...'"><i class="glyphicon glyphicon-refresh spinning"></i></span>
                    {{ createOnePlayer }}
                </button>
                <button type="button" ng-click="fill(team.teamId)" class="btn btn-info" ng-disabled="enable1=='false'">
                    <span ng-show="fillLineUp == 'Filling Team Sheet...'"><i class="glyphicon glyphicon-refresh spinning"></i></span>
                    {{ fillLineUp }}
                </button>
                <button type="button" ng-click="deleteAll(team.teamId)" class="btn btn-danger" ng-disabled="enable2=='false'">
                    <span ng-show="deleteLineUp == 'Removing Players...'"><i class="glyphicon glyphicon-refresh spinning"></i></span>
                    {{ deleteLineUp }}
                </button>
            </div>
            <br>
            <div>
                <span class="label label-success">Starters  <span class="badge"> {{team.starters}}</span></span>
                <span class="label label-warning">Substitutes  <span class="badge"> {{team.substitutes}}</span></span>
<!--                <button type="button" class="btn btn-primary">Starters <span class="badge">{{team.starters}}</span></button>-->
<!--                <button type="button" class="btn btn-primary">Substitutes <span class="badge">{{team.substitutes}}</span></button>-->
            </div>
        </div>
        <div>
            <br>
        </div>
        <br>
        <br>
        <div class="col-lg-12">
            <br>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <form class="form-inline">
                        <div class="form-group">
                            <label >Search</label>
                            <input type="text" ng-model="search" class="form-control" placeholder="Search">
                        </div>
                        <div>
                            <label style="float: left">Click on team name to view its roster</label>
                            <label style="float: right">Click on column header to sort</label>
                        </div>
                    </form>
                    <table class="table" datatable="ng" dt-options="vm.dtOptions" id="table">
                        <thead>
                        <tr>
                            <th ng-click="sort('playerId')" data-field="playerId">ID
                                <i class="sort-icon" ng-show="sortKey=='playerId'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('playerName')" data-field="playerName">Player Name
                                <i class="sort-icon" ng-show="sortKey=='playerName'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('playerType')" data-field="playerType">Player Type
                                <i class="sort-icon" ng-show="sortKey=='playerType'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('speed')" data-field="speed">Speed
                                <i class="sort-icon" ng-show="sortKey=='speed'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('strength')" data-field="speed">Strength
                                <i class="sort-icon" ng-show="sortKey=='strength'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('agility')" data-field="speed">Agility
                                <i class="sort-icon" ng-show="sortKey=='agility'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th data-field="total">Total</th>
                            <th data-field="total">Attributes</th>
                            <th ng-click="sort('salary')" data-field="salary">Salary
                                <i class="sort-icon" ng-show="sortKey=='salary'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th data-field="Settings">Settings</th>
                        </tr>

                        </thead>

                        <tbody>
                        <tr ng-repeat="p in players|orderBy:sortKey:reverse|filter:search">
                            <td>
                               {{$index+1}}
                            </td>
                            <td>

                                {{p.playerName}}
                            </td>
                            <td>

                                {{p.playerType.playerTypeDetails}}

                            </td>
                            <td>

                                {{p.speed}}

                            </td>
                            <td>

                                {{p.strength}}

                            </td>
                            <td>

                                {{p.agility}}

                            </td>
                            <td colspan="2">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow={{p.total}} aria-valuemin="0" aria-valuemax="100" style="width: {{p.total}}%">{{p.total}}</div>
                                </div>

                            </td>
                            <td>

                                {{p.salary}}

                            </td>

                            <td>
                                <a class="lan-remove" href="javascript:void(0);" ng-click="delete(p.playerId)"
                                   title="Remove">
                                    <i class="fa fa-trash fa-1x"></i>
                                </a>
                                <a class="lan-edit" href="javascript:void(0);" title="Edit">
                                    <i class="fa fa-pencil-square-o fa-1x"></i>
                                </a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    <dir-pagination-controls
                        max-size="5"
                        direction-links="true"
                        boundary-links="true" >
                    </dir-pagination-controls>
                </div>

            </div>
        </div>


    </div>
</div>
