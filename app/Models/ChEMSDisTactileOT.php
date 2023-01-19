<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChEMSDisTactileOT as BaseChEMSDisTactileOT;

class ChEMSDisTactileOT extends BaseChEMSDisTactileOT
{
  protected $fillable = [
    'right',
    'left',

    'type_record_id',
    'ch_record_id',

  ];
}
