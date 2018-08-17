<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 17 Aug 2018 21:50:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Teams12213
 * 
 * @property int $TeamId
 * @property string $TeamName
 * @property \Carbon\Carbon $recordCreatedDate
 * @property \Carbon\Carbon $recordUpdatedDated
 * @property string $Deleted
 * 
 * @property \Illuminate\Database\Eloquent\Collection $players
 *
 * @package App\Models
 */
class Teams12213 extends Eloquent
{
	protected $table = 'Teams12213';
	protected $primaryKey = 'TeamId';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TeamId' => 'int'
	];

	protected $dates = [
		'recordCreatedDate',
		'recordUpdatedDated'
	];

	protected $fillable = [
		'TeamName',
		'recordCreatedDate',
		'recordUpdatedDated',
		'Deleted'
	];

	public function players()
	{
		return $this->hasMany(\App\Models\Player::class, 'TeamId');
	}
}
