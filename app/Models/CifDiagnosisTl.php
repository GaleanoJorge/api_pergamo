<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\CifDiagnosisTl as BaseCifDiagnosisTl;

class CifDiagnosisTl extends BaseCifDiagnosisTl
{
  protected $fillable = [
    'text',
    'type_record_id',
    'ch_record_id',
  ];
}
