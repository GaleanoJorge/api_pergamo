<?php

namespace App\Models;

use App\Models\Base\AuthStatus as BaseAuthStatus;

class AuthStatus extends BaseAuthStatus
{
	protected $fillable = [
		'name',
		'code',
	];
}
