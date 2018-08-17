<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 17 Aug 2018 21:50:11 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Team
 * 
 * @property int $teamId
 * @property string $teamName
 * @property string $recordCreatedDate
 * @property string $recordUpdatedDate
 * @property string $deleted
 *
 * @package App\Models
 */
class Team extends Eloquent
{
	protected $primaryKey = 'teamId';
	public $timestamps = false;

	protected $fillable = [
		'teamName',
		'recordCreatedDate',
		'recordUpdatedDate',
		'deleted'
	];
}
