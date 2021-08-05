<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\CourseEducationalInstitution;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseInstitutionCohort
 * 
 * @property int $id
 * @property string $cohort
 * @property int $course_institution_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CourseEducationalInstitution $course_educational_institution
 *
 * @package App\Models\Base
 */
class CourseInstitutionCohort extends Model
{
	protected $table = 'course_institution_cohort';

	protected $casts = [
		'course_institution_id' => 'int'
	];

	public function course_educational_institution()
	{
		return $this->belongsTo(CourseEducationalInstitution::class, 'course_institution_id');
	}
}
