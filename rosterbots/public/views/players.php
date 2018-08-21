<div class="row">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>List of Players in the Team: {{team.teamName}}</h1>
            <div>
                <button type="button" ng-click="goBack()" class="btn btn-default"><i class="fas fa-chevron-left"></i> Go
                    back to Teams
                </button>
            </div>
            <br>
            <div>
                <button type="button" ng-click="createOne(team.teamId)" class="btn btn-info">Create a Player</button>
                <button type="button" ng-click="fill(team.teamId)" class="btn btn-info">Fill the Line Up</button>
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

                    <table class="table" id="table">
                        <thead>
                        <tr>
                            <th data-field="teamId">ID</th>
                            <th data-field="playerName">Player Name</th>
                            <th data-field="playerType">Player Type</th>
                            <th data-field="speed">Speed</th>
                            <th data-field="strength">Strength</th>
                            <th data-field="agility">Agility</th>
                            <th data-field="total">Total</th>
                            <th data-field="total">Attributes</th>
                            <th data-field="Salary">Salary</th>
                            <th data-field="settings">Settings</th>
                        </tr>

                        </thead>

                        <tbody>
                        <tr ng-repeat="p in players">
                            <td>
                                {{p.playerId}}
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
                </div>

            </div>
        </div>


    </div>
</div>
