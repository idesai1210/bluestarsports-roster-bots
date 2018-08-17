<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/17/18
 * Time: 5:14 PM
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class TeamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'teamName' => $this->teamName
        ];
    }

    public static function toModel($resource, $team){
        $team->teamName = $resource->teamName;

        $now = new \DateTime();
        $updatedDate = date("Y-m-d H:i:s", $now->getTimestamp());
        $team->recordUpdatedDate = $updatedDate;

        return $team;
    }
}
