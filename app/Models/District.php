<?php

namespace App\Models;

use App\Models\Base\District as BaseDistrict;

class District extends BaseDistrict
{
	protected $fillable = [
		'name',
		'sectional_council_id',
		'status_id'
	];
}
