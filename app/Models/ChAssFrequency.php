<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssFrequency as BaseChAssFrequency;

class ChAssFrequency extends BaseChAssFrequency
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
  ];
}
