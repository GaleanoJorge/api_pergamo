<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AnswerType;
use App\Models\Question;
use App\Models\SurveyDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * 
 * @property int $id
 * @property int $answer_type_id
 * @property string $name
 * @property int $order
 * @property float $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property AnswerType $answer_type
 * @property Collection|Question[] $questions
 * @property Collection|SurveyDetail[] $survey_details
 *
 * @package App\Models\Base
 */
class Answer extends Model
{
	protected $table = 'answer';

	protected $casts = [
		'answer_type_id' => 'int',
		'order' => 'int',
		'value' => 'float'
	];

	public function answer_type()
	{
		return $this->belongsTo(AnswerType::class);
	}

	public function questions()
	{
		return $this->belongsToMany(Question::class, 'answers_question')
					->withPivot('id', 'order')
					->withTimestamps();
	}

	public function survey_details()
	{
		return $this->hasMany(SurveyDetail::class);
	}
}
