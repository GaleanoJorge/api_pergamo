<?php

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

/**
 * Class ActivityLms
 *
 * @package App\Models\Base
 */
class ActivityLms extends Model
{
	protected $table = 'activity_lms';

	public function course()
	{
		return $this->belongsTo(Course::class, 'course_id');
	}
    public function rubrics()
    {
        return $this->hasMany(Rubric::class, 'activity_id');
    }
}
