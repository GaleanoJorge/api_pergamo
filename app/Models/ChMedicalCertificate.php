<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChMedicalCertificate as BaseChMedicalCertificate;

class ChMedicalCertificate extends BaseChMedicalCertificate
{
  protected $fillable = [
    'description',
    'ch_record_id',
    'type_record_id',
  
  ];
}
