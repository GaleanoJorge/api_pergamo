<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\CustomField;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomFieldCourse
 * 
 * @property int $id
 * @property int $custom_field_id
 * @property int $course_id
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property CustomField $custom_field
 *
 * @package App\Models\Base
 */
class CustomFieldCourse extends Model
{
	protected $table = 'custom_field_course';

	protected $casts = [
		'custom_field_id' => 'int',
		'course_id' => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function custom_field()
	{
		return $this->belongsTo(CustomField::class);
	}
}
