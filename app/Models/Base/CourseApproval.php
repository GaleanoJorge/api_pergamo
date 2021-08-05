<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseApproval
 * 
 * @property int $id
 * @property int $course_id
 * @property string $approval_file
 * @property Carbon $approval_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 *
 * @package App\Models\Base
 */
class CourseApproval extends Model
{
	protected $table = 'course_approval';

	protected $casts = [
		'course_id' => 'int'
	];

	protected $dates = [
		'approval_date'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}
}
