<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\InterventionTl as BaseInterventionTl;

class InterventionTl extends BaseInterventionTl
{
  protected $fillable = [
    'text',
    'type_record_id',
    'ch_record_id',
  ];
}
