<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChInterconsultation as BaseChInterconsultation;

class ChInterconsultation extends BaseChInterconsultation
{
  protected $fillable = [
    'specialty_id',
    'amount',
    'hourly_frequency_id',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
