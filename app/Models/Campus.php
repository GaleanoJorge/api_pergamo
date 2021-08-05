<?php

namespace App\Models;

use App\Models\Base\Campus as BaseCampus;

class Campus extends BaseCampus
{
	protected $fillable = [
		'name',
		'country_id'
	];

	public function countrys()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
