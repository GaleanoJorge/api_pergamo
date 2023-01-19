<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAuscultation as BaseChAuscultation;

class ChAuscultation extends BaseChAuscultation
{
  protected $fillable = [
    'auscultation',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
