<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLms extends Base\ActivityLms
{
    protected $fillable = [
        'name',
        'course_id',
    ];
}
