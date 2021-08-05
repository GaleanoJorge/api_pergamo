<?php

namespace App\Models;

use App\Models\Base\CompetitionCourse as BaseCompetitionCourse;

class CompetitionCourse extends BaseCompetitionCourse
{
	protected $fillable = [
		'competition_id',
		'course_id'
	];
}
