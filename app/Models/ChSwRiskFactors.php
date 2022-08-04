<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwRiskFactors as BaseChSwRiskFactors;

class ChSwRiskFactors extends BaseChSwRiskFactors
{
  protected $fillable = [
    'net',
    'spa',
    'violence',
    'victim',
    'economic',
    'living',
    'attention',
    'stigmatization',
    'interference',
    'spaces',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
