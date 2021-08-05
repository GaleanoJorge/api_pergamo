<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\CourseInstitutionCohort;
use App\Models\EducationalInstitution;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseEducationalInstitution
 * 
 * @property int $id
 * @property int $course_id
 * @property int $educational_institution_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property EducationalInstitution $educational_institution
 * @property Collection|CourseInstitutionCohort[] $course_institution_cohorts
 *
 * @package App\Models\Base
 */
class CourseEducationalInstitution extends Model
{
	protected $table = 'course_educational_institution';

	protected $casts = [
		'course_id' => 'int',
		'educational_institution_id' => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function educational_institution()
	{
		return $this->belongsTo(EducationalInstitution::class);
	}

	public function course_institution_cohorts()
	{
		return $this->hasMany(CourseInstitutionCohort::class, 'course_institution_id');
	}
}
