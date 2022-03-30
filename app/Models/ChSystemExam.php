<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\ChSystemExam as BaseChSystemExam;

class ChSystemExam extends BaseChSystemExam
{
  protected $fillable = [
    'type_ch_system_exam_id',
    'revision',
    'observation',
    'type_record_id',
    'ch_record_id',
  ];
}
