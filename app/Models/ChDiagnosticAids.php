<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChDiagnosticAids as BaseChDiagnosticAids;

class ChDiagnosticAids extends BaseChDiagnosticAids
{
  protected $fillable = [
    'paraclinical',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
