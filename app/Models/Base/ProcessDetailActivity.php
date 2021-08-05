<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ActivityLms;
use App\Models\ProcessDetail;
use App\Models\ProcessDetailActivityCompetences;
use App\Models\Rubric;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProcessDetailActivity
 *
 * @property int $id
 * @property int $process_detail_id
 * @property int $activity_lms_id
 * @property float $grade
 * @property string $observation
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property ActivityLms $activity_lms
 * @property ProcessDetail $process_detail
 * @property Collection|ProcessDetailActivityCompetences[] $process_detail_activity_competences
 * @property Collection|Rubric[] $rubrics
 *
 * @package App\Models\Base
 */
class ProcessDetailActivity extends Model
{
	protected $table = 'process_detail_activity';

	protected $casts = [
		'process_detail_id' => 'int',
		'activity_lms_id' => 'int',
		'grade' => 'float'
	];

	public function activity_lms()
	{
		return $this->belongsTo(ActivityLms::class, 'activity_lms_id');
	}

	public function process_detail()
	{
		return $this->belongsTo(ProcessDetail::class);
	}

	public function process_detail_activity_competences()
	{
		return $this->hasMany(ProcessDetailActivityCompetences::class, 'process_d_a_id');
	}

	public function rubrics()
	{
		return $this->belongsToMany(Rubric::class, 'process_detail_activity_rubric', 'process_d_a_id')
					->withPivot('id', 'grade', 'observation')
					->withTimestamps();
	}
}
