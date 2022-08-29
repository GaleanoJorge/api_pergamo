<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChNursingNote as BaseChNursingNote;

class ChNursingNote extends BaseChNursingNote
{
  protected $fillable = [
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
