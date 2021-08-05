<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\QuestionType;
use App\Models\Section;
use App\Models\Status;
use App\Models\SurveyDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * 
 * @property int $id
 * @property int $question_type_id
 * @property int $section_id
 * @property string $name
 * @property string $description
 * @property int $order
 * @property string $attribute
 * @property int $status_id
 * @property string $aling
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property QuestionType $question_type
 * @property Section $section
 * @property Status $status
 * @property Collection|Answer[] $answers
 * @property Collection|SurveyDetail[] $survey_details
 *
 * @package App\Models\Base
 */
class Question extends Model
{
	protected $table = 'question';

	protected $casts = [
		'question_type_id' => 'int',
		'section_id' => 'int',
		'order' => 'int',
		'status_id' => 'int'
	];

	public function question_type()
	{
		return $this->belongsTo(QuestionType::class);
	}

	public function section()
	{
		return $this->belongsTo(Section::class);
	}

	public function status()
	{
		return $this->belongsTo(Status::class);
	}

	public function answers()
	{
		return $this->belongsToMany(Answer::class, 'answers_question')
					->withPivot('id', 'order')
					->withTimestamps();
	}

	public function survey_details()
	{
		return $this->hasMany(SurveyDetail::class);
	}
}
