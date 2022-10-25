<?php

namespace App\Models;

use App\Models\Base\DashboardRole as BaseDashboardRole;

class DashboardRole extends BaseDashboardRole
{
	protected $fillable = [
		'dashboard_id',
		'role_id',
	];
}
