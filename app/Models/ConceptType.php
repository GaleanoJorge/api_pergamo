<?php

namespace App\Models;

use App\Models\Base\ConceptType as BaseConceptType;

class ConceptType extends BaseConceptType
{
	protected $fillable = [
		'name',
		'description'
	];
}
