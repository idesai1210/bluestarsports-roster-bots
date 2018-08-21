<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/17/18
 * Time: 4:57 PM
 */

namespace App\Http\Controllers;

use App\Http\Resources\PlayerResource;
use App\Http\Resources\TeamResource;
use App\Models\Player;
use App\Models\PlayerType;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamsController extends Controller
{

    public function getAll()
    {

        $query = Team::query();

        $teams = $query->where('deleted', 'N')->get();
        $count = count($teams);

        $teams = (object)['records' => TeamResource::collection($teams), 'count' => $count];

        return response()->json($teams, 200);
    }

    public function getById($id)
    {

        $query = Team::findOrFail($id);
        $team = new TeamResource($query);

        return response()->json($team, 200);
    }

    public function getAllPlayers($id)
    {

        // Verify Team exists
        $team = Team::findOrFail($id);

        $players = $team->players()->where('deleted', 'N')->get();

        $count = count($players);

        $res = (object)['records' => PlayerResource::collection($players), 'count' => $count];

        return response()->json($res, 200);

    }

    public function create(Request $request)
    {


        $res = new TeamResource($request);

        $team = new Team();
        $team = TeamResource::toModel($res, $team);

        $team->save();

        $res = new TeamResource($team);

        return response()->json($res, 201);
    }

    public function createOneRandom($id){
        $team = Team::findOrFail($id);

        $startersType = PlayerType::findOrFail(1);
        $starterPlayers = $startersType->players()->where('teamId', $id)->where('deleted', 'N')->get();
        $starterCount = count($starterPlayers);
        $starter = 10 - $starterCount;

        $subsType = PlayerType::findOrFail(2);
        $subsPlayers = $subsType->players()->where('teamId', $id)->where('deleted', 'N')->get();
        $subsCount = count($subsPlayers);
        $subs = 5 - $subsCount;

        $salarySumQuery = Player::query();
        $salarySum = $salarySumQuery->where('teamId', $id)->where('deleted', 'N')->orderBy('teamId')->sum('salary');
        $number_of_groups = $starter + $subs;
        $sum_to = 175 - $salarySum;
        $salaries = PlayerResource::randomSalary($number_of_groups, $sum_to);


        $player = null;

        while($player == null) {
            $rand = rand ( 1 , 100);
            //even starter // odd sub
            if ($rand % 2 == 0 && $starter > 0 && $sum_to > 0) {
                $player = PlayerResource::create($id, 'Starters', array_pop($salaries));
                $player->save();
            } else if ($rand % 2 != 0 && $subs > 0 && $sum_to > 0) {
                $player = PlayerResource::create($id, 'Substitutes', array_pop($salaries));
                $player->save();
            }
        }

        $players = $team->players()->where('deleted', 'N')->get();

        $count = count($players);

        $res = (object)['records' => PlayerResource::collection($players), 'count' => $count];

        return response()->json($res, 200);
    }

    public function createRandom($id)
    {

        $team = Team::findOrFail($id);

        $startersType = PlayerType::findOrFail(1);
        $starterPlayers = $startersType->players()->where('teamId', $id)->where('deleted', 'N')->get();
        $starterCount = count($starterPlayers);
        $starter = 10 - $starterCount;

        $subsType = PlayerType::findOrFail(2);
        $subsPlayers = $subsType->players()->where('teamId', $id)->where('deleted', 'N')->get();
        $subsCount = count($subsPlayers);
        $subs = 5 - $subsCount;

        $salarySumQuery = Player::query();
        $salarySum = $salarySumQuery->where('teamId', $id)->where('deleted', 'N')->orderBy('teamId')->sum('salary');
        $number_of_groups = $starter + $subs;
        $sum_to = 175 - $salarySum;
        $salaries = PlayerResource::randomSalary($number_of_groups, $sum_to);

        for ($s = 0; $s < $starter; $s++) {
            $player = PlayerResource::create($id, 'Starters', array_pop($salaries));
            $player->save();
        }

        for ($s = 0; $s < $subs; $s++) {
            $player = PlayerResource::create($id, 'Substitutes', array_pop($salaries));
            $player->save();
        }


        $players = $team->players()->where('deleted', 'N')->get();

        $count = count($players);

        $res = (object)['records' => PlayerResource::collection($players), 'count' => $count];

        return response()->json($res, 200);

    }

    public function update(Request $request, $id)
    {

        $team = Team::findOrFail($id);

        $res = new TeamResource($request);

        $team = TeamResource::toModel($res, $team);

        $team->save();

        $res = new TeamResource($team);

        return response()->json($res, 200);
    }

    public function delete(Request $request, $id)
    {

        $team = Team::findOrFail($id);

        $team->deleted = 'Y';
        $now = new \DateTime();
        $updatedDate = date("Y-m-d H:i:s", $now->getTimestamp());
        $team->recordUpdatedDate = $updatedDate;
        $team->save();

        return response()->json(null, 204);

    }


}
