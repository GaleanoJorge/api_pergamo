<?php

namespace App\Models;

use App\Models\Base\EventDay as BaseEventDay;

class EventDay extends BaseEventDay
{
	protected $fillable = [
		'event_id',
		'day_number',
		'date_planned',
		'description'
	];

	protected $casts = [
		'date_planned' => 'date:Y-m-d'
	];
}
