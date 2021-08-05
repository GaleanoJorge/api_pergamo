<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AnswerType;
use App\Models\Coursebase;
use App\Models\Question;
use App\Models\Survey;
use App\Models\SurveyDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 * 
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $coursebase_id
 * @property bool $is_matriz
 * @property int $answer_type_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property AnswerType $answer_type
 * @property Coursebase $coursebase
 * @property Collection|Question[] $questions
 * @property Collection|SurveyDetail[] $survey_details
 * @property Collection|Survey[] $surveys
 *
 * @package App\Models\Base
 */
class Section extends Model
{
	protected $table = 'section';

	protected $casts = [
		'coursebase_id' => 'int',
		'is_matriz' => 'bool',
		'answer_type_id' => 'int'
	];

	public function answer_type()
	{
		return $this->belongsTo(AnswerType::class);
	}

	public function coursebase()
	{
		return $this->belongsTo(Coursebase::class);
	}

	public function questions()
	{
		return $this->hasMany(Question::class);
	}

	public function survey_details()
	{
		return $this->hasMany(SurveyDetail::class);
	}

	public function surveys()
	{
		return $this->belongsToMany(Survey::class, 'survey_sections')
					->withPivot('id', 'name', 'order', 'weight', 'is_percent', 'user_role_id', 'course_id')
					->withTimestamps();
	}
}
