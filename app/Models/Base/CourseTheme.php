<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Course;
use App\Models\Theme;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CourseTheme
 * 
 * @property int $id
 * @property int $course_id
 * @property int $themes_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Course $course
 * @property Theme $theme
 *
 * @package App\Models\Base
 */
class CourseTheme extends Model
{
	protected $table = 'course_themes';

	protected $casts = [
		'course_id' => 'int',
		'themes_id' => 'int'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function theme()
	{
		return $this->belongsTo(Theme::class, 'themes_id');
	}
}
