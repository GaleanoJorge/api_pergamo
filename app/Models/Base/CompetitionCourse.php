<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Competition;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CompetitionCourse
 * 
 * @property int $id
 * @property int $competition_id
 * @property int $course_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Competition $competition
 * @property Course $course
 *
 * @package App\Models\Base
 */
class CompetitionCourse extends Model
{
	protected $table = 'competition_course';

	protected $casts = [
		'competition_id' => 'int',
		'course_id' => 'int'
	];

	public function competition()
	{
		return $this->belongsTo(Competition::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}
}
