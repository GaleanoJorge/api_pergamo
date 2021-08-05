<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Section;
use App\Models\SurveySection;
use App\Models\UserAssignSurvey;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyDetail
 * 
 * @property int $id
 * @property int $user_assign_survey_id
 * @property int $survey_section_id
 * @property int $section_id
 * @property int $question_id
 * @property int $answer_id
 * @property string $detail
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Answer $answer
 * @property Question $question
 * @property Section $section
 * @property SurveySection $survey_section
 * @property UserAssignSurvey $user_assign_survey
 *
 * @package App\Models\Base
 */
class SurveyDetail extends Model
{
	protected $table = 'survey_detail';

	protected $casts = [
		'user_assign_survey_id' => 'int',
		'survey_section_id' => 'int',
		'section_id' => 'int',
		'question_id' => 'int',
		'answer_id' => 'int'
	];

	public function answer()
	{
		return $this->belongsTo(Answer::class);
	}

	public function question()
	{
		return $this->belongsTo(Question::class);
	}

	public function section()
	{
		return $this->belongsTo(Section::class);
	}

	public function survey_section()
	{
		return $this->belongsTo(SurveySection::class);
	}

	public function user_assign_survey()
	{
		return $this->belongsTo(UserAssignSurvey::class);
	}
}
