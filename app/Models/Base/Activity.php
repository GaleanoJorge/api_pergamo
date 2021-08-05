<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ActivityType;
use App\Models\Criterion;
use App\Models\Delivery;
use App\Models\Goal;
use App\Models\GroupActivity;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activity
 * 
 * @property int $id
 * @property int $session_id
 * @property int $activity_type_id
 * @property string $name
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property ActivityType $activity_type
 * @property Session $session
 * @property Collection|Criterion[] $criteria
 * @property Collection|Goal[] $goals
 * @property Collection|Delivery[] $deliveries
 * @property Collection|GroupActivity[] $group_activities
 *
 * @package App\Models\Base
 */
class Activity extends Model
{
	protected $table = 'activity';

	protected $casts = [
		'session_id' => 'int',
		'activity_type_id' => 'int'
	];

	public function activity_type()
	{
		return $this->belongsTo(ActivityType::class);
	}

	public function session()
	{
		return $this->belongsTo(Session::class);
	}

	public function criteria()
	{
		return $this->belongsToMany(Criterion::class, 'criterion_activity_goal')
					->withPivot('id', 'goal_id')
					->withTimestamps();
	}

	public function goals()
	{
		return $this->belongsToMany(Goal::class, 'criterion_activity_goal')
					->withPivot('id', 'criterion_id')
					->withTimestamps();
	}

	public function deliveries()
	{
		return $this->hasMany(Delivery::class);
	}

	public function group_activities()
	{
		return $this->hasMany(GroupActivity::class);
	}
}
