<?php

namespace App\Models;

use App\Models\Base\UserOrigin as BaseUserOrigin;

class UserOrigin extends BaseUserOrigin
{
	protected $fillable = [
		'user_id',
		'origin_id'
	];
}
