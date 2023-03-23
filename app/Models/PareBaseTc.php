<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\PareBaseTc as BasePareBaseTc;

class PareBaseTc extends BasePareBaseTc
{
  protected $fillable = [
    'phone',
    'status_call',
    'agent',
    'date_time',
    'duration_seg',
    'uniqueid',
    'cedula_RUC',
    'first_name',
    'last_name',
    'observations',
    'fila'
  ];
}
