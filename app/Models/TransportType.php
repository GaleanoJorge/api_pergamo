<?php

namespace App\Models;

use App\Models\Base\TransportType as BaseTransportType;

class TransportType extends BaseTransportType
{
	protected $fillable = [
		'name',
		'description'
	];
}
