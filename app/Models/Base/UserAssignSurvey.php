<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AssignedStatus;
use App\Models\SurveyDetail;
use App\Models\SurveyInstance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAssignSurvey
 * 
 * @property int $id
 * @property int $survey_instance_id
 * @property int $assigned_status_id
 * @property int $user_id
 * @property float $duration
 * @property Carbon $dt_init
 * @property Carbon $dt_finish
 * @property float $qualification
 * @property float $qualification_claim
 * @property string $comments
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property AssignedStatus $assigned_status
 * @property SurveyInstance $survey_instance
 * @property User $user
 * @property Collection|SurveyDetail[] $survey_details
 *
 * @package App\Models\Base
 */
class UserAssignSurvey extends Model
{
	protected $table = 'user_assign_survey';

	protected $casts = [
		'survey_instance_id' => 'int',
		'assigned_status_id' => 'int',
		'user_id' => 'int',
		'duration' => 'float',
		'qualification' => 'float',
		'qualification_claim' => 'float'
	];

	protected $dates = [
		'dt_init',
		'dt_finish'
	];

	public function assigned_status()
	{
		return $this->belongsTo(AssignedStatus::class);
	}

	public function survey_instance()
	{
		return $this->belongsTo(SurveyInstance::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function survey_details()
	{
		return $this->hasMany(SurveyDetail::class);
	}
}
