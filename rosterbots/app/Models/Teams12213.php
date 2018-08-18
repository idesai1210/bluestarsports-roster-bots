<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 18 Aug 2018 00:21:21 +0000.
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
}
