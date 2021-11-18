<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\Gloss as BaseGloss;

class Gloss extends BaseGloss
{
  protected $fillable = [

    'objetion_type_id',
    'repeated_initial_id',
    'company_id',
    'campus_id',
    'gloss_ambit_id',
    'gloss_modality_id',
    'gloss_service_id',
    'objetion_code_id',
    'gloss_status_id',
    'user_id',
    'received_by_id',
    'invoice_prefix',
    'objetion_detail',
    'invoice_consecutive',
    'objeted_value',
    'invoice_value',
    'emission_date',
    'radication_date',
    'received_date'

  ];
}
