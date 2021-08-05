<?php

namespace App\Models;

use App\Models\Base\EventTicket as BaseEventTicket;

class EventTicket extends BaseEventTicket
{
	protected $fillable = [
		'event_concept_id',
		'passenger_user_id',
		'origin',
		'destination',
		'back',
		'departure_date',
		'return_date',
		'departure_observations',
		'return_observations',
		'change_observations',
		'ticket_number',
		'airline',
		'total_value',
		'grade',
		'ticket_state',
		'invoice_number',
		'invoice_date',
		'administrative_fee',
		'iva',
		'ticket_value',
		'discount',
		'airport_fee',
		'fuel',
		'others_taxes',
		'iva_administrative_fee',
		'flight_review',
		'observations'
	];

    protected $casts = [
        'departure_date' => 'date:Y-m-d',
        'return_date' => 'date:Y-m-d'
    ];
}
