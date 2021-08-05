<?php

namespace App\Models;

use App\Models\Base\Concept as BaseConcept;

class Concept extends BaseConcept
{
	protected $fillable = [
		'concept_base_id',
		'validity_id',
		'municipality_id',
		'unit_value'
	];
}
