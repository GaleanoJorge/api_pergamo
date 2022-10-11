<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPsOperationalization as BaseChPsOperationalization;

class ChPsOperationalization extends BaseChPsOperationalization
{
  protected $fillable = [
    'assessment',
    'type_record_id',
    'ch_record_id'
  ];
}
