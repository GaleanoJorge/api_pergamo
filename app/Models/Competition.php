<?php

namespace App\Models;

use App\Models\Base\Competition as BaseCompetition;

class Competition extends BaseCompetition
{
	protected $fillable = [
		'name',
		'description'
	];
}
