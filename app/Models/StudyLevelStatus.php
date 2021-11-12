<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\StudyLevelStatus as BaseStudyLevelStatus;

class StudyLevelStatus extends BaseStudyLevelStatus
{
    protected $fillable = [
    'name'

	];
}
