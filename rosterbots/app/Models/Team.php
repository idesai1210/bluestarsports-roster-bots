<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 21 Aug 2018 01:22:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Team
 * 
 * @property int $teamId
 * @property string $teamName
 * @property \Carbon\Carbon $recordCreatedDate
 * @property \Carbon\Carbon $recordUpdatedDate
 * @property string $deleted
 * 
 * @property \Illuminate\Database\Eloquent\Collection $players
 *
 * @package App\Models
 */
class Team extends Eloquent
{
	protected $primaryKey = 'teamId';
	public $timestamps = false;

	protected $dates = [
		'recordCreatedDate',
		'recordUpdatedDate'
	];

	protected $fillable = [
		'teamName',
		'recordCreatedDate',
		'recordUpdatedDate',
		'deleted'
	];

	public function players()
	{
		return $this->hasMany(\App\Models\Player::class, 'teamId');
	}
}
