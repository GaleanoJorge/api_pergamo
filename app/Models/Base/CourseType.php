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
 * Class CourseType
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
class CourseType extends Model
{
	protected $table = 'course_type';

	public function courses()
	{
		return $this->hasMany(Course::class);
	}
}
