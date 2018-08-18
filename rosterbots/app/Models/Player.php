<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 18 Aug 2018 14:25:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Player
 * 
 * @property int $playerId
 * @property string $playerName
 * @property int $teamId
 * @property int $playerTypeId
 * @property string $speed
 * @property string $strength
 * @property string $agility
 * @property string $total
 * @property string $salary
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
		'playerName',
		'teamId',
		'playerTypeId',
		'speed',
		'strength',
		'agility',
		'total',
		'salary',
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
