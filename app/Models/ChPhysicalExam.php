<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChPhysicalExam as BaseChPhysicalExam;

class ChPhysicalExam extends BaseChPhysicalExam
{
  protected $fillable = [
    'type_ch_physical_exam_id',
    'revision',
    'type_record_id',
    'ch_record_id',
  ];
}
