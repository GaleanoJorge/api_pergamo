<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use App\Models\Competition;
use App\Models\Goal;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Criterion
 * 
 * @property int $id
 * @property int $competition_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Competition $competition
 * @property Collection|Activity[] $activities
 * @property Collection|Goal[] $goals
 *
 * @package App\Models\Base
 */
class Criterion extends Model
{
	protected $table = 'criterion';

	protected $casts = [
		'competition_id' => 'int'
	];

	public function competition()
	{
		return $this->belongsTo(Competition::class);
	}

	public function activities()
	{
		return $this->belongsToMany(Activity::class, 'criterion_activity_goal')
					->withPivot('id', 'goal_id')
					->withTimestamps();
	}

	public function goals()
	{
		return $this->belongsToMany(Goal::class, 'criterion_activity_goal')
					->withPivot('id', 'activity_id')
					->withTimestamps();
	}
}
