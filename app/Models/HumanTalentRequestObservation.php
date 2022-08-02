<?php

namespace App\Models;

use App\Models\Base\HumanTalentRequestObservation as BaseHumanTalentRequestObservation;


class HumanTalentRequestObservation extends BaseHumanTalentRequestObservation
{
	protected $fillable = [
		'name',
		'category',
	];

}
