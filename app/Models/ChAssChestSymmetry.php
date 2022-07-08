<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChAssChestSymmetry as BaseChAssChestSymmetry;

class ChAssChestSymmetry extends BaseChAssChestSymmetry
{
  protected $fillable = [
    'name',
    'type_record_id',
    'ch_record_id',
  ];
}
