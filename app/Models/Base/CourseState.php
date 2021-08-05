<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseState
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Course[] $courses
 *
 * @package App\Models\Base
 */
class CourseState extends Model
{
	protected $table = 'course_states';

	public function courses()
	{
		return $this->hasMany(Course::class, 'course_states_id');
	}
}
