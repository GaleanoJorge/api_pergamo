<?php

namespace App\Models;

use App\Models\Base\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
	protected $fillable = [
		'name',
		'link',
	];
}
