<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Section;
use App\Models\Status;
use App\Models\SurveyInstance;
use App\Models\SurveyType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Survey
 * 
 * @property int $id
 * @property int $survey_type_id
 * @property string $name
 * @property string $description
 * @property Carbon $duration
 * @property string $url_image
 * @property int $status_id
 * @property float $max_points
 * @property string $objetives
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Status $status
 * @property SurveyType $survey_type
 * @property Collection|SurveyInstance[] $survey_instances
 * @property Collection|Section[] $sections
 *
 * @package App\Models\Base
 */
class Survey extends Model
{
	protected $table = 'survey';

	protected $casts = [
		'survey_type_id' => 'int',
		'status_id' => 'int',
		'max_points' => 'float'
	];

	protected $dates = [
		'duration'
	];

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function survey_type()
	{
		return $this->belongsTo(SurveyType::class);
	}

	public function survey_instances()
	{
		return $this->hasMany(SurveyInstance::class);
	}

	public function sections()
	{
		return $this->belongsToMany(Section::class, 'survey_sections')
					->withPivot('id', 'name', 'order', 'weight', 'is_percent', 'user_role_id', 'course_id')
					->withTimestamps();
	}
}
