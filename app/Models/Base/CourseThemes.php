<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\Themes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseModule
 * 
 * @property int $id
 * @property int $course_id
 * @property int $theme_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property Themes $themes
 *
 * @package App\Models\Base
 */
class CourseThemes extends Model
{
	protected $table = 'course_themes';

	protected $casts = [
		'course_id' => 'int',
		'theme_id' => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function themes()
	{
		return $this->belongsTo(Themes::class);
	}
}
