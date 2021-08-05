<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseModule
 * 
 * @property int $id
 * @property int $course_id
 * @property int $module_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property Module $module
 *
 * @package App\Models\Base
 */
class CourseModule extends Model
{
	protected $table = 'course_module';

	protected $casts = [
		'course_id' => 'int',
		'module_id' => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function module()
	{
		return $this->belongsTo(Module::class);
	}
}
