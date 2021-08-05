<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\Section;
use App\Models\Survey;
use App\Models\SurveyDetail;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveySection
 * 
 * @property int $id
 * @property int $survey_id
 * @property int $section_id
 * @property string $name
 * @property int $order
 * @property float $weight
 * @property bool $is_percent
 * @property int $user_role_id
 * @property int $course_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property Section $section
 * @property Survey $survey
 * @property UserRole $user_role
 * @property Collection|SurveyDetail[] $survey_details
 *
 * @package App\Models\Base
 */
class SurveySection extends Model
{
	protected $table = 'survey_sections';

	protected $casts = [
		'survey_id' => 'int',
		'section_id' => 'int',
		'order' => 'int',
		'weight' => 'float',
		'is_percent' => 'bool',
		'user_role_id' => 'int',
		'course_id' => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function section()
	{
		return $this->belongsTo(Section::class);
	}

	public function survey()
	{
		return $this->belongsTo(Survey::class);
	}

	public function user_role()
	{
		return $this->belongsTo(UserRole::class);
	}

	public function survey_details()
	{
		return $this->hasMany(SurveyDetail::class);
	}
}
