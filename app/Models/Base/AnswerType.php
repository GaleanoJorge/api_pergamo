<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnswerType
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Answer[] $answers
 * @property Collection|Section[] $sections
 *
 * @package App\Models\Base
 */
class AnswerType extends Model
{
	protected $table = 'answer_type';

	public function answers()
	{
		return $this->hasMany(Answer::class);
	}

	public function sections()
	{
		return $this->hasMany(Section::class);
	}
}
