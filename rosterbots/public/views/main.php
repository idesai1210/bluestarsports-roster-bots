<div class="row">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>List Of Teams In The League</h1>
            <form ng-submit="addTeam()" name="team">
                <div class="col-lg-10">
                <input ng-model="myinput" type="text" name="todo" placeholder="Type a team name and press Enter"
                       class="form-control input-lg">
                </div>
                <div class="col-lg-2">
                <input type="submit" class="btn btn-primary btn-lg" id="submit" value="Go" />
                </div>
            </form>
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
                    <table class="table" id="table">
                        <thead>
                        <tr>
                            <th align="text-center" ng-click="sort('teamId')" data-field="teamId">ID
                                <i class="sort-icon" ng-show="sortKey=='teamId'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('teamName')" data-field="teamName">Team Name
                                <i class="sort-icon" ng-show="sortKey=='teamName'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('starters')" data-field="starters">Starters
                                <i class="sort-icon" ng-show="sortKey=='starters'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('substitutes')" data-field="substitutes">Substitutes
                                <i class="sort-icon" ng-show="sortKey=='substitutes'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th ng-click="sort('salary')" data-field="salary">Team Salary
                                <i class="sort-icon" ng-show="sortKey=='salary'" ng-class="{'fas fa-chevron-up':reverse,'fas fa-chevron-down':!reverse}"></i>
                            </th>
                            <th data-field="Settings">Settings</th>
                        </tr>

                        </thead>

                        <tbody>
                        <tr ng-repeat="t in teams|orderBy:sortKey:reverse|filter:search">
                            <td style="text-align: center">
                                <a href="/#!/players/{{t.teamId}}" title="See Details">
                                    {{$index+1}}
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a href="/#!/players/{{t.teamId}}" title="See Details">
                                    {{t.teamName}}
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a href="/#!/players/{{t.teamId}}" title="See Details">
                                    {{t.starters}} of 10
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a href="/#!/players/{{t.teamId}}" title="See Details">
                                    {{t.substitutes}} of 5
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a href="/#!/players/{{t.teamId}}" title="See Details">
                                    {{t.salary}}
                                </a>
                            </td>
                            <td style="text-align: center">
                                <a class="lan-remove" style="text-align: center" href="javascript:void(0);" ng-click="delete(t.teamId)"
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
