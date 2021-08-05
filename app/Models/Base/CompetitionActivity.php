<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Activity;
use App\Models\Competition;
use App\Models\ProcessDetailActivityCompetences;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompetitionActivity
 *
 * @property int $id
 * @property int $activity_id
 * @property int $competition_id
 * @property int $process_d_a_c_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Activity $activity
 * @property Competition $competition
 * @property ProcessDetailActivityCompetences $process_detail_activity_competence
 *
 * @package App\Models\Base
 */
class CompetitionActivity extends Model
{
	protected $table = 'competition_activity';

	protected $casts = [
		'activity_id' => 'int',
		'competition_id' => 'int',
		'process_d_a_c_id' => 'int'
	];

	public function activity()
	{
		return $this->belongsTo(ActivityLms::class);
	}

	public function competition()
	{
		return $this->belongsTo(Competition::class);
	}

	public function process_detail_activity_competence()
	{
		return $this->belongsTo(ProcessDetailActivityCompetences::class, 'process_d_a_c_id');
	}
}
