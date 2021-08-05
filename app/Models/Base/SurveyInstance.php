<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Category;
use App\Models\Course;
use App\Models\Origin;
use App\Models\Status;
use App\Models\Survey;
use App\Models\UserAssignSurvey;
use App\Models\Validity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyInstance
 * 
 * @property int $id
 * @property int $survey_id
 * @property string $description
 * @property Carbon $dt_init
 * @property Carbon $dt_finish
 * @property int $status_id
 * @property float $points_eval
 * @property string $objetive
 * @property Carbon $dt_active
 * @property int $validity_id
 * @property int $origin_id
 * @property int $category_id
 * @property int $course_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 * @property Course $course
 * @property Origin $origin
 * @property Status $status
 * @property Survey $survey
 * @property Validity $validity
 * @property Collection|UserAssignSurvey[] $user_assign_surveys
 *
 * @package App\Models\Base
 */
class SurveyInstance extends Model
{
	protected $table = 'survey_instance';

	protected $casts = [
		'survey_id' => 'int',
		'status_id' => 'int',
		'points_eval' => 'float',
		'validity_id' => 'int',
		'origin_id' => 'int',
		'category_id' => 'int',
		'course_id' => 'int'
	];

	protected $dates = [
		'dt_init',
		'dt_finish',
		'dt_active'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function origin()
	{
		return $this->belongsTo(Origin::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function survey()
	{
		return $this->belongsTo(Survey::class);
	}

	public function validity()
	{
		return $this->belongsTo(Validity::class);
	}

	public function user_assign_surveys()
	{
		return $this->hasMany(UserAssignSurvey::class);
	}
}
