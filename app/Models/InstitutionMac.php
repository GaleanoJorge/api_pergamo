<?php

namespace App\Models;

use App\Models\Base\InstitutionMac as BaseInstitutionMac;

class InstitutionMac extends BaseInstitutionMac
{
	protected $fillable = [
		'educational_institution_id',
		'mac'
	];
}
