<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/19/18
 * Time: 9:40 PM
 */

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class PlayerTypeResource extends JsonResource
{

    public function toArray($request)
    {
        return[
           'playerTypeId' => $this->playerTypeId,
           'playerTypeDetails' => $this->playerTypeDetails
        ] ;
    }
}
