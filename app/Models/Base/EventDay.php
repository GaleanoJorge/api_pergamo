<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Event;
use App\Models\EventConcept;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventDay
 * 
 * @property int $id
 * @property int $event_id
 * @property int $day_number
 * @property Carbon $date_planned
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Event $event
 * @property Collection|EventConcept[] $event_concepts
 *
 * @package App\Models\Base
 */
class EventDay extends Model
{
	protected $table = 'event_day';

	protected $casts = [
		'event_id' => 'int',
		'day_number' => 'int'
	];

	protected $dates = [
		'date_planned'
	];

	public function event()
	{
		return $this->belongsTo(Event::class);
	}

	public function event_concepts()
	{
		return $this->hasMany(EventConcept::class);
	}
}
