<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Concept;
use App\Models\Event;
use App\Models\EventDay;
use App\Models\EventTicket;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventConcept
 * 
 * @property int $id
 * @property int $concept_id
 * @property int $event_id
 * @property int $event_day_id
 * @property int $planned_quantity
 * @property float $planned_unit_value
 * @property Carbon $real_date
 * @property int $real_quantity
 * @property float $real_unit_value
 * @property string $ticket_code
 * @property string $evidence_path
 * @property string $observations
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Concept $concept
 * @property EventDay $event_day
 * @property Event $event
 * @property Collection|EventTicket[] $event_tickets
 *
 * @package App\Models\Base
 */
class EventConcept extends Model
{
	protected $table = 'event_concept';

	protected $casts = [
		'concept_id' => 'int',
		'event_id' => 'int',
		'event_day_id' => 'int',
		'planned_quantity' => 'int',
		'planned_unit_value' => 'float',
		'real_quantity' => 'int',
		'real_unit_value' => 'float'
	];

	protected $dates = [
		'real_date'
	];

	public function concept()
	{
		return $this->belongsTo(Concept::class);
	}

	public function event_day()
	{
		return $this->belongsTo(EventDay::class);
	}

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function event_tickets()
	{
		return $this->hasMany(EventTicket::class);
	}
}
