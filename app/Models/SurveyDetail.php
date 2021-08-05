<?php

namespace App\Models;

use App\Models\Base\SurveyDetail as BaseSurveyDetail;
use App\Models\UserAssignSurvey;

class SurveyDetail extends BaseSurveyDetail
{
	protected $fillable = [
		'user_assign_survey_id',
		'survey_section_id',
		'section_id',
		'question_id',
		'answer_id',
		'detail'
	];

	public static function checkAssignedStatus(int $id)
	{
		$uas=UserAssignSurvey::find($id);
		if($uas->assigned_status_id<3){
		 $progreso=UserAssignSurvey::select(
			 \DB::raw('COUNT(question.id) AS tot_preg'),
			 \DB::raw('SUM(IF(survey_detail.answer_id IS NOT NULL OR survey_detail.detail IS NOT NULL, 1,0 )) AS tot_resp')
			 )
			 ->Join('survey_instance', 'user_assign_survey.survey_instance_id', 'survey_instance.id')
			->Join('survey', 'survey_instance.survey_id', 'survey.id')
			->Join('survey_sections', 'survey_sections.survey_id', 'survey.id')
			->Join('section', 'survey_sections.section_id', 'section.id')
			->Join('question', 'question.section_id', 'section.id')
			->leftJoin('survey_detail', function ($join) {
				$join->on('survey_detail.question_id', '=', 'question.id');
				$join->on('survey_detail.section_id', '=', 'section.id');
				$join->on('survey_detail.survey_section_id', '=', 'survey_sections.id');
				$join->on('survey_detail.user_assign_survey_id', '=', 'user_assign_survey.id');
			})->where('user_assign_survey.id',$id)->first();
			
			if($progreso->tot_resp==$progreso->tot_preg){
				$uas->assigned_status_id=3;
				$uas->save();
			}elseif($progreso->tot_resp>0){
				$uas->assigned_status_id=2;
				$uas->save();
			}			
		}
	}
}
