<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/17/18
 * Time: 4:57 PM
 */
namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller{

    public function getAll(){

        $query = Team::query();

        $teams = $query->where('deleted', 'N')->get();
        return response()->json($teams, 200);
    }

    public function create(Request $request){


        $res = new TeamResource($request);

        $team = new Team();
        $team = TeamResource::toModel($res, $team);

        $team->save();

        $res = new TeamResource($team);

        return response()->json($res, 201);
    }

    public function update(Request $request, $id){

        $team = Team::findOrFail($id);

        $res = new TeamResource($request);

        $team = TeamResource::toModel($res, $team);

        $team->save();

        $res = new TeamResource($team);

        return response()->json($res, 200);
    }

    public function delete(Request $request, $id){

        $team = Team::findOrFail($id);

        $team->deleted = 'Y';
        $now = new \DateTime();
        $updatedDate = date("Y-m-d H:i:s", $now->getTimestamp());
        $team->recordUpdatedDate = $updatedDate;
        $team->save();

        return response()->json(null, 204);

    }

}
