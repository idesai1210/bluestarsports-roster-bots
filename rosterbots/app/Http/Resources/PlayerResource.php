<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/17/18
 * Time: 6:46 PM
 */

namespace App\Http\Resources;


use App\Models\Player;
use App\Models\PlayerType;
use App\Models\Team;
use Illuminate\Http\Resources\Json\JsonResource;


class PlayerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'playerId' => $this->playerId,
            'playerName' => $this->playerName,
            'teamId' => $this->teamId,
            'playerType' => new PlayerTypeResource($this->player_type()->get()->first()),
            'speed' => $this->speed,
            'strength' => $this->strength,
            'agility' => $this->agility,
            'total' => $this->total,
            'salary' => $this->salary
        ];
    }

    public static function toModel($resource, $player)
    {

        $player->playerName = $resource->playerName;
        $player->teamId = $resource->teamId;
        $player->playerTypeId = $resource->playerTypeId;
        $player->speed = $resource->speed;
        $player->strength = $resource->strength;
        $player->agility = $resource->agility;
        $player->total = $resource->total;
        $player->salary = $resource->salary;

        $now = new \DateTime();
        $updatedDate = date("Y-m-d H:i:s", $now->getTimestamp());
        $player->recordUpdatedDate = $updatedDate;

        return $player;
    }

    public static function create($id, $type, $salary)
    {

        $player = new Player();

        $player->playerName = self::randomName(7);
        $player->teamId = $id;

        $playerType = PlayerType::query();
        $playerType = $playerType->where('playerTypeDetails', $type)->get();
        $player->playerTypeId = $playerType[0]->playerTypeId;

        $team = Team::findOrFail($id);
        $groups = self::randomAbilities();
        $player->speed = $groups[0];
        $player->strength = $groups[1];
        $player->agility = $groups[2];
        $player->total = $player->speed + $player->strength + $player->agility;

        $p = $team->players()->where('total', $player->total)->count();


        while($p == 1){
            $groups = self::randomAbilities();
            $player->speed = $groups[0];
            $player->strength = $groups[1];
            $player->agility = $groups[2];
            $player->total = $player->speed + $player->strength + $player->agility;
            $p = $team->players()->where('total', $player->total)->count();

        }


        $player->salary = $salary;

        return $player;

    }

    public static function randomName($length)
    {
//        $pool = array_merge(range(0, 9), range('A', 'Z'));
//        $key = "";
//        for ($i = 0; $i < $length; $i++) {
//            $key .= $pool[mt_rand(0, count($pool) - 1)];
//        }

        $range = range('A', 'Z');
        $k = '';
        for($i=0;$i<3;$i++){

            $k .= $range[rand(0,25)];
        }
        for($j=0;$j<4;$j++){
            $k .= rand(0,9);
        }



        return $k;
    }

    public static function randomAbilities()
    {

        $groups = array();
        $group = 0;
        $sum_to = 100;

        $groups[0] = rand(15 , $sum_to/3);
        $groups[1] = rand(15, $sum_to/3);
        $groups[2] = rand(15, $sum_to/3);

        return $groups;

    }

    public static function randomSalary($number_of_groups, $sum_to)
    {
        $salaries = array();
        $salary = 0;

        while (array_sum($salaries) != $sum_to) {
            $salaries[$salary] = mt_rand(1, $sum_to / mt_rand(1, $number_of_groups));

            if (++$salary == $number_of_groups) {
                $salary = 0;
            }
        }
        return $salaries;
    }

}
