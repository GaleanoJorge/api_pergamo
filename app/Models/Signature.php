<?php

namespace App\Models;

use App\Models\Base\Signature as BaseSignature;

class Signature extends BaseSignature
{
	protected $fillable = [
		'url',
		'name',
		'code',
		'elements'
	];
}
