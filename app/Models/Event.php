<?php

namespace App\Models;

use App\Models\Base\Event as BaseEvent;

class Event extends BaseEvent
{
	protected $fillable = [
		'course_id',
		'origin_id',
		'categories_origin_id',
		'entity_type_id',
		'name',
		'municipality_id',
		'place',
		'user_coordinate_id',
		'initial_date',
		'final_date',
		'user_id',
		'number_trainers',
		'summoned_participants',
		'contract_id',
		'approved_status_id',
		'approved_date',
	];

	protected $casts = [
		'initial_date' => 'date:Y-m-d',
		'final_date' => 'date:Y-m-d',
        'approved_date' => 'date:Y-m-d'
	];

    public function user_coordinate()
    {
        return $this->belongsTo(User::class);
    }
}
