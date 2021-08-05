<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CriterionActivityGoal;
use App\Models\Delivery;
use App\Models\UserRoleCourse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Score
 * 
 * @property int $id
 * @property int $delivery_id
 * @property int $criterion_activity_goal_id
 * @property int $user_role_course_id
 * @property float $score
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CriterionActivityGoal $criterion_activity_goal
 * @property Delivery $delivery
 * @property UserRoleCourse $user_role_course
 *
 * @package App\Models\Base
 */
class Score extends Model
{
	protected $table = 'score';

	protected $casts = [
		'delivery_id' => 'int',
		'criterion_activity_goal_id' => 'int',
		'user_role_course_id' => 'int',
		'score' => 'float'
	];

	public function criterion_activity_goal()
	{
		return $this->belongsTo(CriterionActivityGoal::class);
	}

	public function delivery()
	{
		return $this->belongsTo(Delivery::class);
	}

	public function user_role_course()
	{
		return $this->belongsTo(UserRoleCourse::class);
	}
}
