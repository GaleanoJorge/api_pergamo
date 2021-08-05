<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ActivityLms;
use App\Models\ProcessDetailActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubric
 *
 * @property int $id
 * @property string $name
 * @property int $activity_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property ActivityLms $activity_lm
 * @property Collection|ProcessDetailActivity[] $process_detail_activities
 *
 * @package App\Models\Base
 */
class Rubric extends Model
{
	protected $table = 'rubric';

	protected $casts = [
		'activity_id' => 'int'
	];

	public function activity_lms()
	{
		return $this->belongsTo(ActivityLms::class, 'activity_id');
	}

	public function process_detail_activities()
	{
		return $this->belongsToMany(ProcessDetailActivity::class, 'process_detail_activity_rubric', 'rubric_id', 'process_d_a_id')
					->withPivot('id', 'grade', 'observation')
					->withTimestamps();
	}
}
