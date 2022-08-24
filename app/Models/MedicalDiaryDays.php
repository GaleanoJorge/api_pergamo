<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\MedicalDiaryDays as BaseMedicalDiaryDays;

class MedicalDiaryDays extends BaseMedicalDiaryDays
{
    protected $fillable = [

    'name',
    
	];
}
