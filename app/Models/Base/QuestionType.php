<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Question;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuestionType
 * 
 * @property int $id
 * @property string $name
 * @property string $image_question_type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Question[] $questions
 *
 * @package App\Models\Base
 */
class QuestionType extends Model
{
	protected $table = 'question_type';

	public function questions()
	{
		return $this->hasMany(Question::class);
	}
}
