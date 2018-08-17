<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 17 Aug 2018 23:00:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Player
 * 
 * @property int $playerId
 * @property int $teamId
 * @property int $playerTypeId
 * @property string $speed
 * @property string $strength
 * @property string $agility
 * @property string $total
 * @property \Carbon\Carbon $recorodCreatedDate
 * @property \Carbon\Carbon $recordUpdatedDate
 * @property string $deleted
 * 
 * @property \App\Models\PlayerType $player_type
 * @property \App\Models\Team $team
 *
 * @package App\Models
 */
class Player extends Eloquent
{
	protected $primaryKey = 'playerId';
	public $timestamps = false;

	protected $casts = [
		'teamId' => 'int',
		'playerTypeId' => 'int'
	];

	protected $dates = [
		'recorodCreatedDate',
		'recordUpdatedDate'
	];

	protected $fillable = [
		'teamId',
		'playerTypeId',
		'speed',
		'strength',
		'agility',
		'total',
		'recorodCreatedDate',
		'recordUpdatedDate',
		'deleted'
	];

	public function player_type()
	{
		return $this->belongsTo(\App\Models\PlayerType::class, 'playerTypeId');
	}

	public function team()
	{
		return $this->belongsTo(\App\Models\Team::class, 'teamId');
	}
}
