<?php

namespace App\Models;

use App\Models\Base\AuthorizationPackage as BaseAuthorizationPackage;

class AuthorizationPackage extends BaseAuthorizationPackage
{
	protected $fillable = [
		'id',
		'services_briefcase_id',
		'admissions_id',
		'auth_number',
		'state_auth_id',
	];
}
