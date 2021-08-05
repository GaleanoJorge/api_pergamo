<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use App\Models\Criterion;
use App\Models\Goal;
use App\Models\Score;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CriterionActivityGoal
 * 
 * @property int $id
 * @property int $criterion_id
 * @property int $activity_id
 * @property int $goal_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Activity $activity
 * @property Criterion $criterion
 * @property Goal $goal
 * @property Collection|Score[] $scores
 *
 * @package App\Models\Base
 */
class CriterionActivityGoal extends Model
{
	protected $table = 'criterion_activity_goal';

	protected $casts = [
		'criterion_id' => 'int',
		'activity_id' => 'int',
		'goal_id' => 'int'
	];

	public function activity()
	{
		return $this->belongsTo(Activity::class);
	}

	public function criterion()
	{
		return $this->belongsTo(Criterion::class);
	}

	public function goal()
	{
		return $this->belongsTo(Goal::class);
	}

	public function scores()
	{
		return $this->hasMany(Score::class);
	}
}
