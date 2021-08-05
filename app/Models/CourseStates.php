<?php

namespace App\Models;

use App\Models\Base\CourseStates as BaseCourseStates;

class CourseStates extends BaseCourseStates
{
    protected $fillable = [
        'name',
    ];
}
