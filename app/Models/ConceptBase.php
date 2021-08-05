<?php

namespace App\Models;

use App\Models\Base\ConceptBase as BaseConceptBase;

class ConceptBase extends BaseConceptBase
{
	protected $fillable = [
		'name',
		'description',
		'concept_type_id',
		'transport_type_id',
		'origin',
		'destination',
		'back'
	];
}
