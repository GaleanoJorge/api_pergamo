<?php

namespace App\Models;

use App\Models\Base\UserRoleEducationalInstitution as BaseUserRoleEducationalInstitution;

class UserRoleEducationalInstitution extends BaseUserRoleEducationalInstitution
{
	protected $fillable = [
		'user_role_id',
		'educational_institution_id'
	];
}
