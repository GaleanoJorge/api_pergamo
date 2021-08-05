<?php

namespace App\Models;

use App\Models\Base\ProcessDetailState as BaseProcessDetailState;

class ProcessDetailState extends BaseProcessDetailState
{
	protected $fillable = [
		'name'
	];

	public const STATUS_CREATED = 1;
	public const STATUS_UPDATED = 2;
	public const STATUS_ERROR = 3;
}
