<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/17/18
 * Time: 6:45 PM
 */

namespace App\Http\Controllers;


use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function get($name){


        $query = Player::query();
        $player = $query->where('playerName', $name)->get();

        if(isset($player[0])){
            $res = array(array("result"=>"fail"));
            return response()->json($res, 200);
        }
        else{
            $res = array(array("result"=>"Success"));
            return response()->json($res, 200);
        }


    }

    public function create(Request $request){

        $res = new PlayerResource($request);

        $player = new Player();
        $player = PlayerResource::toModel($res, $player);

        $player->save();

        $res = new PlayerResource($player);

        return response()->json($res, 201);
    }


    public function update(Request $request, $id){

        $player = Player::findOrFail($id);

        $res = new PlayerResource($request);

        $player = PlayerResource::toModel($res, $player);

        $player->save();

        $res = new PlayerResource($player);

        return response()->json($res, 200);
    }

    public function delete(Request $request, $id){

        $player = Player::findOrFail($id);

        $player->deleted = 'Y';
        $now = new \DateTime();
        $updatedDate = date("Y-m-d H:i:s", $now->getTimestamp());
        $player->recordUpdatedDate = $updatedDate;
        $player->save();

        return response()->json(null, 204);

    }
}
