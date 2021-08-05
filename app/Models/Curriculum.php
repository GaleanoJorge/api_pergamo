<?php

namespace App\Models;

use App\Models\Base\Curriculum as BaseCurriculum;

class Curriculum extends BaseCurriculum
{
	protected $fillable = [
		'municipality_id',
		'circuit_id',
		'district_id',
		'sectional_council_id',
		'region_id',
		'specialty_id',
		'office_id',
		'dependence_id',
		'entity_id',
		'position_id',
		'user_id',
		'inactive'
	];
}
