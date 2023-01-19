<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChHairValoration as BaseChHairValoration;

class ChHairValoration extends BaseChHairValoration
{
  protected $fillable = [
    'hair_revision',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
