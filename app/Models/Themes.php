<?php

namespace App\Models;

use App\Models\Base\Themes as BaseThemes;

class Themes extends BaseThemes
{
	protected $fillable = [
		'name',
		'description',
		'status_id'
	];
}
