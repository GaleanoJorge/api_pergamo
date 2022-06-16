<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssChestType as BaseChAssChestType;

class ChAssChestType extends BaseChAssChestType
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
  ];
}
