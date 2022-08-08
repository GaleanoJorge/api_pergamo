<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSwNursing as BaseChSwNursing;

class ChSwNursing extends BaseChSwNursing
{
  protected $fillable = [
    'firstname',
    'middlefirstname',
    'lastname',
    'middlelastname',
    'phone',
    'service',
    'type_record_id',
    'ch_record_id'
  ];
}
