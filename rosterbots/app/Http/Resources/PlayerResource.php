<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/17/18
 * Time: 6:46 PM
 */

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'playerName' => $this->playerName,
            'teamId' => $this->teamId,
            'playerTypeId' => $this->playerTypeId,
            'speed' => $this->speed,
            'strength' => $this->strength,
            'agility' => $this->agility,
            'total' => $this->total
        ];
    }
    public static function toModel($resource, $player){

        $player->playerName = $resource->playerName;
        $player->teamId = $resource->teamId;
        $player->playerTypeId = $resource->playerTypeId;
        $player->speed = $resource->speed;
        $player->strength = $resource->strength;
        $player->agility = $resource->agility;
        $player->total = $resource->total;

        $now = new \DateTime();
        $updatedDate = date("Y-m-d H:i:s", $now->getTimestamp());
        $player->recordUpdatedDate = $updatedDate;

        return $player;
    }
}
