<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\NursingCarePlan as BaseNursingCarePlan;

class NursingCarePlan extends BaseNursingCarePlan
{
    protected $fillable = [
    'description',

	];
}
