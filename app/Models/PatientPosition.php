<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PatientPosition as BasePatientPosition;

class PatientPosition extends BasePatientPosition
{
    protected $fillable = [
    'name',

	];
}
