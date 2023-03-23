<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseAdhesionTc as BaseBaseAdhesionTc;

class BaseAdhesionTc extends BaseBaseAdhesionTc
{
  protected $fillable = [
    'agent',
    'name',
    'date_init',
    'date_end',
    'total_login'
  ];
}
