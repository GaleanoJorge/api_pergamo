<?php

namespace App\Models;

use App\Models\Base\CustomFieldEducationalInstitution as BaseCustomFieldEducationalInstitution;

class CustomFieldEducationalInstitution extends BaseCustomFieldEducationalInstitution
{
	protected $fillable = [
		'custom_field_id',
		'educational_institution_id',
		'value'
	];
}
