<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\TlTherapyLanguageRegular as BaseTlTherapyLanguageRegular;

class TlTherapyLanguageRegular extends BaseTlTherapyLanguageRegular
{
  protected $fillable = [
    'diagnosis_id',
    'status_patient',
    'type_record_id',
    'ch_record_id',
  ];
}
