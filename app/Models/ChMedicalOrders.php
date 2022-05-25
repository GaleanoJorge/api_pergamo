<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChMedicalOrders as BaseChMedicalOrders;

class ChMedicalOrders extends BaseChMedicalOrders
{
  protected $fillable = [
    'ambulatory_medical_order',
    'procedure_id',
    'amount',
    'hourly_frequency_id',
    'observations',
    'type_record_id',
    'ch_record_id',
  ];
}
