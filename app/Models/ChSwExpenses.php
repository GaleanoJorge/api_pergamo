<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwExpenses as BaseChSwExpenses;

class ChSwExpenses extends BaseChSwExpenses
{
  protected $fillable = [
    'feeding',
    'gas',
    'light',
    'aqueduct',
    'rent',
    'transportation',
    'recreation',
    'education',
    'medical',
    'cell_phone',
    'landline',
    'total',
    'type_record_id',
    'ch_record_id'
  ];
}
