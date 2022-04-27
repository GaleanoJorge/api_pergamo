<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseLocationCapacity as BaseBaseLocationCapacity;

class BaseLocationCapacity extends BaseBaseLocationCapacity
{
    protected $fillable = [
      'assistance_id',
      'locality_id',
      'phone_consult',
      'PAD_base_patient_quantity',
	];
}
