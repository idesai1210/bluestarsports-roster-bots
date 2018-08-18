<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 18 Aug 2018 00:21:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PlayerType
 * 
 * @property int $playerTypeId
 * @property string $playerTypeDetails
 * 
 * @property \Illuminate\Database\Eloquent\Collection $players
 *
 * @package App\Models
 */
class PlayerType extends Eloquent
{
	protected $table = 'playerType';
	protected $primaryKey = 'playerTypeId';
	public $timestamps = false;

	protected $fillable = [
		'playerTypeDetails'
	];

	public function players()
	{
		return $this->hasMany(\App\Models\Player::class, 'playerTypeId');
	}
}
