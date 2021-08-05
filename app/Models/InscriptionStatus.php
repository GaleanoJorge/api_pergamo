<?php

namespace App\Models;

use App\Models\Base\InscriptionStatus as BaseInscriptionStatus;

class InscriptionStatus extends BaseInscriptionStatus
{
	protected $fillable = [
		'name'
	];
}
