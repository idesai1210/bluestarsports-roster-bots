<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 17 Aug 2018 21:50:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Player
 * 
 * @property int $PlayerId
 * @property int $TeamId
 * @property string $Speed
 * @property string $Strength
 * @property string $Agility
 * @property string $Total
 * @property \Carbon\Carbon $recorodCreatedDate
 * @property \Carbon\Carbon $recordUpdatedDate
 * @property string $Deleted
 * 
 * @property \App\Models\Teams12213 $teams12213
 *
 * @package App\Models
 */
class Player extends Eloquent
{
	protected $primaryKey = 'PlayerId';
	public $timestamps = false;

	protected $casts = [
		'TeamId' => 'int'
	];

	protected $dates = [
		'recorodCreatedDate',
		'recordUpdatedDate'
	];

	protected $fillable = [
		'TeamId',
		'Speed',
		'Strength',
		'Agility',
		'Total',
		'recorodCreatedDate',
		'recordUpdatedDate',
		'Deleted'
	];

	public function teams12213()
	{
		return $this->belongsTo(\App\Models\Teams12213::class, 'TeamId');
	}
}
