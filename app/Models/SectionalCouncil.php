<?php

namespace App\Models;

use App\Models\Base\SectionalCouncil as BaseSectionalCouncil;

class SectionalCouncil extends BaseSectionalCouncil
{
	protected $fillable = [
		'status_id',
		'name'
	];
}
