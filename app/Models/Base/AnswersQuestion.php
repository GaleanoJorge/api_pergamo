<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnswersQuestion
 * 
 * @property int $id
 * @property int $question_id
 * @property int $answer_id
 * @property int $order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Answer $answer
 * @property Question $question
 *
 * @package App\Models\Base
 */
class AnswersQuestion extends Model
{
	protected $table = 'answers_question';

	protected $casts = [
		'question_id' => 'int',
		'answer_id' => 'int',
		'order' => 'int'
	];

	public function answer()
	{
		return $this->belongsTo(Answer::class);
	}

	public function question()
	{
		return $this->belongsTo(Question::class);
	}
}
