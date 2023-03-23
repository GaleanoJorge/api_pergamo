<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\AttendedTc as BaseAttendedTc;

class AttendedTc extends BaseAttendedTc
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
