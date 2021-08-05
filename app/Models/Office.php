<?php

namespace App\Models;

use App\Models\Base\Office as BaseOffice;

class Office extends BaseOffice
{
	protected $fillable = [
		'name',
		'status_id'
	];
}
