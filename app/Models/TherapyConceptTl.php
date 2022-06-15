<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TherapyConceptTl as BaseTherapyConceptTl;

class TherapyConceptTl extends BaseTherapyConceptTl
{
  protected $fillable = [
    'text',
    'type_record_id',
    'ch_record_id',
  ];
}
