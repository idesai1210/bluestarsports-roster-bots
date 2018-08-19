<div class="row">
    <div class="container">
        <div class="col-lg-8 col-lg-offset-2">
            <h1>List of Teams in the Roster!</h1>
            <form ng-submit="addTeam()">
                <input ng-model="myinput" type="text" name="todo" placeholder="Type a team Name to create a new team..."
                       class="form-control input-lg">
            </form>
        </div>
        <div>
            <br>
        </div>
        <br>
        <br>
        <div class="col-lg-8 col-lg-offset-2">
            <br>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">

                    <table class="table" id="table">
                        <thead>
                        <tr>
                            <th data-field="teamId">ID</th>
                            <th data-field="teamName">Team Name</th>
                            <th data-field="Settings">Settings</th>
                        </tr>

                        </thead>

                        <tbody>
                        <tr ng-repeat="t in teams">
                            <td>
                                <a href="/players/{{t.teamId}}" title="See Details">
                                    {{t.teamId}}
                                </a>
                            </td>
                            <td>
                                <a href="javascript:void(0);" ng-click="delete(t.teamId)" title="See Details">
                                    {{t.teamName}}
                                </a>
                            </td>
                            <td>
                                <a class="lan-remove" href="javascript:void(0);" ng-click="delete(t.teamId)"
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
