<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\InstalledCapacity as BaseInstalledCapacity;

class InstalledCapacity extends BaseInstalledCapacity
{
    protected $fillable = [
      'user_id',
      'start_date',
      'finish_date',
      'PAD_patient_quantity',
	
	];
}
