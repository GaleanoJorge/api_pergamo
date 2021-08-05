<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ApprovedStatus;
use App\Models\CategoriesOrigin;
use App\Models\Concept;
use App\Models\Contract;
use App\Models\Course;
use App\Models\EntityType;
use App\Models\EventDay;
use App\Models\HistoryEventApproved;
use App\Models\Municipality;
use App\Models\Origin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 * 
 * @property int $id
 * @property int $course_id
 * @property int $origin_id
 * @property int $categories_origin_id
 * @property int $entity_type_id
 * @property string $name
 * @property int $municipality_id
 * @property string $place
 * @property int $user_coordinate_id
 * @property Carbon $initial_date
 * @property Carbon $final_date
 * @property int $user_id
 * @property int $number_trainers
 * @property int $summoned_participants
 * @property int $contract_id
 * @property int $approved_status_id
 * @property Carbon $approved_date
 * @property bool $is_close
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ApprovedStatus $approved_status
 * @property CategoriesOrigin $categories_origin
 * @property Contract $contract
 * @property Course $course
 * @property EntityType $entity_type
 * @property Municipality $municipality
 * @property Origin $origin
 * @property User $user
 * @property Collection|Concept[] $concepts
 * @property Collection|EventDay[] $event_days
 * @property Collection|HistoryEventApproved[] $history_event_approveds
 *
 * @package App\Models\Base
 */
class Event extends Model
{
	protected $table = 'event';

	protected $casts = [
		'course_id' => 'int',
		'origin_id' => 'int',
		'categories_origin_id' => 'int',
		'entity_type_id' => 'int',
		'municipality_id' => 'int',
		'user_coordinate_id' => 'int',
		'user_id' => 'int',
		'number_trainers' => 'int',
		'summoned_participants' => 'int',
		'contract_id' => 'int',
		'approved_status_id' => 'int',
		'is_close' => 'bool'
	];

	protected $dates = [
		'initial_date',
		'final_date',
		'approved_date'
	];

	public function approved_status()
	{
		return $this->belongsTo(ApprovedStatus::class);
	}

	public function categories_origin()
	{
		return $this->belongsTo(CategoriesOrigin::class);
	}

	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function entity_type()
	{
		return $this->belongsTo(EntityType::class);
	}

	public function municipality()
	{
		return $this->belongsTo(Municipality::class);
	}

	public function origin()
	{
		return $this->belongsTo(Origin::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function concepts()
	{
		return $this->belongsToMany(Concept::class, 'event_concept')
					->withPivot('id', 'event_day_id', 'planned_quantity', 'planned_unit_value', 'real_date', 'real_quantity', 'real_unit_value', 'ticket_code', 'evidence_path', 'observations')
					->withTimestamps();
	}

	public function event_days()
	{
		return $this->hasMany(EventDay::class);
	}

	public function history_event_approveds()
	{
		return $this->hasMany(HistoryEventApproved::class);
	}
}
