<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\LocationCapacity as BaseLocationCapacity;

class LocationCapacity extends BaseLocationCapacity
{
    protected $fillable = [
      'assistance_id',
      'locality_id',
      'PAD_patient_quantity',
      'PAD_patient_attended',
      'PAD_patient_actual_capacity',
	];
}
