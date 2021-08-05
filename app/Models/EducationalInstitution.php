<?php

namespace App\Models;

use App\Models\Base\EducationalInstitution as BaseEducationalInstitution;

class EducationalInstitution extends BaseEducationalInstitution
{
	protected $fillable = [
		'municipality_id',
		'name',
		'educational_institution_type_id',
		'parent_id'
	];
}
