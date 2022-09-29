<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsIntervention as BaseChPsIntervention;

class ChPsIntervention extends BaseChPsIntervention
{
  protected $fillable = [
    'assessment',
    'type_record_id',
    'ch_record_id'
  ];
}
